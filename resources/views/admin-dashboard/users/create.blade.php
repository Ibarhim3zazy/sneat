@extends('admin-dashboard.master')

@section('title', 'Add User')
@section('users-active', 'active')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Roles</h4>

    <form class="row" action="{{ route('admin.dashboard.users.store') }}" method="POST">
        @csrf
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Add New</h5>
                <div class="card-body">
                    <div class="row gy-3 mt-4">
                        <div class="col-md-6">
                            <label for="defaultFormControlInput" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="defaultFormControlInput"
                                placeholder="Name" aria-describedby="defaultFormControlHelp" />
                        </div>
                        <div class="col-md-6">
                            <label for="defaultFormControlInput" class="form-label">email</label>
                            <input type="text" class="form-control" name="email" id="defaultFormControlInput"
                                placeholder="Email" aria-describedby="defaultFormControlHelp" />
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