<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;

class AdminController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::paginate(10);
        return view('admin-dashboard.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::where('guard_name', 'admin')->get();
        return view('admin-dashboard.admins.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        $data = $request->validated();
        $admin = Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        if (isset($data['role'])) $admin->assignRole($data['role']);
        return redirect()->route('admin.dashboard.admins.index')->with('status', 'Admin has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        $roles = Role::where('guard_name', 'admin')->get();
        return view('admin-dashboard.admins.show', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        $roles = Role::where('guard_name', 'admin')->get();
        return view('admin-dashboard.admins.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $data = $request->validated();
        if (isset($data['password']) == null) {
            unset($data['password']);
        } else {
            $data['password'] = bcrypt($data['password']);
        }
        $admin->update($data);
        if (isset($data['role'])) $admin->syncRoles($data['role']);
        return redirect()->route('admin.dashboard.admins.index')->with('status', 'Admin has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admin.dashboard.admins.index')->with('status', 'Admin has been deleted successfully.');
    }
}
