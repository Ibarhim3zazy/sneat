<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class UserController extends Controller
{

    public function __construct()
    {
        // $this->middleware('check_permission:view_user,add_user,edit_user')->except('index');
        // $this->middleware('check_permission:view_user')->only('show');
        // $this->middleware('check_permission:add_user')->only('create', 'store');
        // $this->middleware('check_permission:edit_user')->only('edit', 'update');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin-dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Gate::forUser(Auth::guard('admin')->user())->Authorize('add_user');
        if (Auth::guard('admin')->user()->cannot('add_user')) {
            abort(403);
        }
        return view('admin-dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
