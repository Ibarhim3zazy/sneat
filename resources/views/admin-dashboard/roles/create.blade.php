@extends('admin-dashboard.master')

@section('title', 'Create Role')
@section('roles-active', 'active')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Roles</h4>

    <form class="row" action="{{ route('admin.dashboard.roles.store') }}" method="POST">
        @csrf
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Add New</h5>
                <div class="card-body">
                    <div>
                        <label for="defaultFormControlInput" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="defaultFormControlInput"
                            placeholder="Editor" aria-describedby="defaultFormControlHelp" />
                    </div>
                    <!-- Inline Checkboxes -->
                    <div class="row gy-3 mt-4">
                        <div class="col-md-12">
                            <input class="form-check-input" type="checkbox" id="select-all-permissions"
                                value="select-all" />
                            <label class="form-check-label" for="select-all-permissions">Select All</label>
                        </div>
                        @foreach ($permissions as $permission)
                        <div class="col-md-4">
                            <input class="form-check-input" type="checkbox" id="permission{{ $permission->id }}"
                                name="permissionArray[{{ $permission->name }}]" />
                            <label class="form-check-label" for="permission{{ $permission->id }}">{{ $permission->name
                                }}</label>
                        </div>
                        @endforeach
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection