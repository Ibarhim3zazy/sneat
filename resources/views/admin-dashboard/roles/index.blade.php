@extends('admin-dashboard.master')

@section('title', 'Roles Table')
@section('roles-active', 'active')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Roles
        <a href="{{ route('admin.dashboard.roles.create') }}"><button type="button"
                class="btn btn-primary float-end">Add New</button></a>
    </h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">Roles</h5>
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th>Role Name</th>
                        <th width="10%">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if ($roles->count() < 1) <tr>
                        <td colspan="3" class="text-center text-danger">No roles found</td>
                        </tr>
                        @else
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ $roles->firstItem() + $loop->index }}</td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $role->name }}</strong>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ route('admin.dashboard.roles.show', $role) }}"><i
                                                class="bx bx-show-alt me-1"></i>
                                            Show</a>
                                        <a class="dropdown-item"
                                            href="{{ route('admin.dashboard.roles.edit', $role) }}"><i
                                                class="bx bx-edit-alt me-1"></i>
                                            Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);"
                                            onclick="document.getElementById('delete-role-form-{{ $role->id }}').submit(); return false;"><i
                                                class="bx bx-trash me-1"></i>
                                            Delete</a>
                                        <form id="delete-role-form-{{ $role->id }}"
                                            action="{{ route('admin.dashboard.roles.destroy', $role) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                </tbody>
            </table>
        </div>
    </div>
    {{-- pagination --}}
    <div class="d-flex justify-content-start mt-3">
        @if(isset($roles))
        {{ $roles->links('pagination::bootstrap-5') }}
        @endif
    </div>

    <!--/ Basic Bootstrap Table -->

</div>
@endsection