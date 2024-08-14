<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::where('guard_name', 'admin')->paginate(10);
        return view('admin-dashboard.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::where('guard_name', 'admin')->get();
        return view('admin-dashboard.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $data = $request->validated();
        // dd($data);
        try {
            $role = Role::create([
                'name' => $data['name'], 
                'guard_name' => 'admin'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('admin.dashboard.roles.create')->withErrors(['status' => 'Role creation failed.']);
        }
        
        if (isset($data['permissionArray'])) {
            foreach ($data['permissionArray'] as $permission => $value) {
                $role->givePermissionTo($permission);
            }
        }
        
        return redirect()->route('admin.dashboard.roles.index')->with('status', 'Role has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        $permissions = Permission::where('guard_name', 'admin')->get();
        return view('admin-dashboard.roles.show', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::where('guard_name', 'admin')->get();
        return view('admin-dashboard.roles.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $data = $request->validated();
        $role->update(['name' => $data['name']]);
        $role->syncPermissions(array_keys($data['permissionArray']));
        return redirect()->route('admin.dashboard.roles.index')->with('status', 'Role has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.dashboard.roles.index')->with('status', 'Role has been deleted successfully.');
    }
}
