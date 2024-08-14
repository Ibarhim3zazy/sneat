@extends('admin-dashboard.master')

@section('title', 'Add User')
@section('admins-active', 'active')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Roles</h4>

    <form class="row" action="{{ route('admin.dashboard.admins.update', $admin) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Add New</h5>
                <div class="card-body">
                    <div class="row gy-3 mt-4">
                        <div class="col-md-6">
                            <label for="defaultFormControlInput" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="defaultFormControlInput"
                                value="{{ $admin->name }}" aria-describedby="defaultFormControlHelp" />
                        </div>
                        <div class="col-md-6">
                            <label for="defaultFormControlInput" class="form-label">email</label>
                            <input type="text" class="form-control" name="email" id="defaultFormControlInput"
                                value="{{ $admin->email }}" aria-describedby=" defaultFormControlHelp" />
                        </div>
                    </div>
                    <!-- Inline Checkboxes -->
                    <div class="row gy-3 mt-4">
                        <div class="col-md-12">
                            <label for="defaultDropdown" class="form-label">Role</label>
                            <select class="form-select" name="role" id="exampleFormControlSelect1"
                                aria-label="Default select example">
                                <option selected="">Select Role</option>
                                @foreach ($roles as $role)
                                <option value="{{ $role->name }}" @if (count($admin->getRoleNames())
                                    > 0)
                                    {{ $role->name == $admin->getRoleNames()[0] ? 'selected' : '' }}
                                    @endif>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row gy-3 mt-4">
                        <div class="col-md-6">
                            <label for="defaultFormControlInput" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="defaultFormControlInput"
                                aria-describedby="defaultFormControlHelp" />
                        </div>
                        <div class="col-md-6">
                            <label for="defaultFormControlInput" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" />
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection