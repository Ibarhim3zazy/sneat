@extends('admin-dashboard.master')

@section('title', 'Show Role')
@section('roles-active', 'active')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Roles</h4>

    <div class="row">
        @csrf
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Add New</h5>
                <div class="card-body">
                    <div>
                        <label for="defaultFormControlInput" class="form-label">Name</label>
                        <p type="text" class="form-control" name="name" id="defaultFormControlInput"
                            aria-describedby="defaultFormControlHelp">{{ $role->name }}</p>
                    </div>
                    <!-- Inline Checkboxes -->
                    <div class="row gy-3 mt-4">
                        @foreach ($permissions as $permission)
                        <div class="col-md-4">
                            <input class="form-check-input" type="checkbox" id="permission{{ $permission->id }}"
                                name="permissionArray[{{ $permission->name }}]"
                                @checked($role->hasPermissionTo($permission->name)) disabled />
                            <label class="form-check-label" for="permission{{ $permission->id }}">{{ $permission->name
                                }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection