@extends('admin-dashboard.master')

@section('title', 'Show User')
@section('admins-active', 'active')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Roles</h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Show Admin</h5>
                <div class="card-body">
                    <div class="row gy-3 mt-4">
                        <div class="col-md-6">
                            <label for="defaultFormControlInput" class="form-label">Name</label>
                            <p class="form-control" id="defaultFormControlInput"
                                aria-describedby="defaultFormControlHelp">{{ $admin->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <label for="defaultFormControlInput" class="form-label">email</label>
                            <p class="form-control" id="defaultFormControlInput"
                                aria-describedby="defaultFormControlHelp">{{ $admin->email }}</p>
                        </div>
                    </div>
                    @if (count($admin->getRoleNames()) > 0)
                    {{ $admin->getRoleNames()[0] ?? 'asasssssssss' }}
                    @else
                    {{ 'No Roles' }}
                    @endif
                    <!-- Inline Checkboxes -->

                    <div class="row gy-3 mt-4">
                        <div class="col-md-12">
                            <label for="defaultDropdown" class="form-label">Role</label>
                            <select class="form-select" name="role" id="exampleFormControlSelect1"
                                aria-label="Default select example" disabled>
                                <option selected="">Select Role</option>
                                @foreach ($roles as $role)

                                <option value="{{ $role->name }}" @if (count($admin->getRoleNames()) > 0)
                                    {{ $role->name == $admin->getRoleNames()[0] ? 'selected' : '' }}
                                    @endif>
                                    {{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection