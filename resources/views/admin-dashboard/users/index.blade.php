@extends('admin-dashboard.master')

@section('title', 'Users Table')
@section('users-active', 'active')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Roles
        @if (permission('add_user'))
        <a href="{{ route('admin.dashboard.users.create') }}"><button type="button"
                class="btn btn-primary float-end">Add New</button></a>
        @endif
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
                        <th width="15%">Name</th>
                        <th>Email</th>
                        @if (permission(['view_user', 'edit_user', 'delete_user']))
                        <th width="10%">Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if ($users->count() < 1) <tr>
                        <td colspan="3" class="text-center text-danger">No roles found</td>
                        </tr>
                        @else
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $users->firstItem() + $loop->index }}</td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{
                                    $user->name
                                    }}</strong>
                            </td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{
                                    $user->email
                                    }}</strong>
                            </td>
                            @if (permission(['view_user', 'edit_user', 'delete_user']))
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        @if (permission('view_user'))
                                        <a class="dropdown-item"
                                            href="{{ route('admin.dashboard.users.show', $user->id) }}"><i
                                                class="bx bx-show-alt me-1"></i>
                                            Show</a>
                                        @endif
                                        @if (permission('edit_user'))
                                        <a class="dropdown-item"
                                            href="{{ route('admin.dashboard.users.edit', $user) }}"><i
                                                class="bx bx-edit-alt me-1"></i>
                                            Edit</a>
                                        @endif
                                        @if (permission('delete_user'))
                                        <a class="dropdown-item" href="javascript:void(0);"
                                            onclick="document.getElementById('delete-admin-form-{{ $user->id }}').submit(); return false;"><i
                                                class="bx bx-trash me-1"></i>
                                            Delete</a>
                                        <form id="delete-admin-form-{{ $user->id }}"
                                            action="{{ route('admin.dashboard.users.destroy', $user) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            @endif
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