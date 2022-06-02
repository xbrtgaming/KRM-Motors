@extends('dashboard/template/index')
@section('title', 'User')
@section('content')

    <div class="container">
        <h4>User Database</h1>
            <div class="card">
                <div class="card-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-linkedin btn-sm float-end material-icons"
                        onClick="window.location.reload()">refresh</button>
                    <button type="button" class="btn bg-gradient-success btn-sm float-end material-icons"
                        data-bs-toggle="modal" data-bs-target="#user_add" style="margin-right:5px;">add
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="user_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-normal" id="exampleModalLabel">
                                        Add User</h5>
                                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin_register') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" name="name">
                                            </div>
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label">Number</label>
                                                <input type="number" class="form-control" name="number">
                                            </div>
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email">
                                            </div>
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label">Password</label>
                                                <input type="password" class="form-control" name="password">
                                            </div>
                                            <div class="input-group input-group-static mb-4">
                                                <label for="level">Level &nbsp;</label>
                                                <select name="level">
                                                    <option value="user">User</option>
                                                    <option value="admin">Admin</option>
                                                </select>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn bg-gradient-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn bg-gradient-success">Confirm</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <table id="datatable" class="hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Level</th>
                                <th>Number</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $users)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $users->name }}</td>
                                    <td>{{ $users->level == 'admin' ? 'Admin' : 'User' }}</td>
                                    <td>{{ $users->number }}</td>
                                    <td>{{ $users->email }}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn bg-gradient-primary btn-sm fas fa-pencil-alt"
                                            data-bs-toggle="modal" data-bs-target="#user_edit{{ $users->id }}">
                                        </button>

                                        <div class="modal fade" id="user_edit{{ $users->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title font-weight-normal" id="exampleModalLabel">
                                                            Edit User</h5>
                                                        <button type="button" class="btn-close text-dark"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if ($errors->any())
                                                            <div class="alert alert-danger text-lightr">
                                                                <ul>
                                                                    @foreach ($errors->all() as $error)
                                                                        <li>{{ $error }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endif
                                                        <form action="{{ route('user_edit', $users->id) }}" method="POST">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="input-group input-group-outline my-3">
                                                                    <label class="form-label">Name</label>
                                                                    <input type="text" class="form-control" name="name"
                                                                        value="{{ $users->name }}">
                                                                </div>
                                                                <div class="input-group input-group-outline my-3">
                                                                    <label class="form-label">Number</label>
                                                                    <input type="number" class="form-control"
                                                                        name="number" value="{{ $users->number }}">
                                                                </div>
                                                                <div class="input-group input-group-outline my-3">
                                                                    <label class="form-label">Email</label>
                                                                    <input type="email" class="form-control" name="email"
                                                                        value="{{ $users->email }}">
                                                                </div>
                                                                <div class="input-group input-group-static mb-4">
                                                                    <label for="level">Level &nbsp;</label>
                                                                    <select name="level">
                                                                        <option>{{ $users->level }}</option>
                                                                        <option value="user">User</option>
                                                                        <option value="admin">Admin</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn bg-gradient-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn bg-gradient-primary">Save
                                                            changes</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="btn btn-warning btn-sm fas fa-lock"></a>
                                        <form action="{{ route('user_delete', $users->id) }}" method="GET"
                                            class="d-inline">
                                            <button type="button" class="btn bg-gradient-danger btn-sm fas fa-trash"
                                                data-bs-toggle="modal" data-bs-target="#user_delete{{ $users->id }}">
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="user_delete{{ $users->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title font-weight-normal"
                                                                id="exampleModalLabel">
                                                                Delete User</h5>
                                                            <button type="button" class="btn-close text-dark"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p> Delete <b>{{ $users->name }}</b> </p>
                                                            Are you sure?
                                                            <li><b>Yes</b> to delete</li>
                                                            <li><b>Cancel</b> to cancel</li>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn bg-gradient-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <form action="{{ route('user_delete', $users->id) }}"
                                                                method="GET" class="d-inline">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn bg-gradient-danger">Yes</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>


@endsection

@if (session()->has('message'))
    @push('toastr')
        <script>
            toastr['{{ session('type') }}']('{{ session('message') }}', '{{ session('title') }}')
        </script>
    @endpush
@elseif ($errors->any())
    @push('toastr')
        <script>
            toastr['error']('Please try again', 'Failed')
        </script>
    @endpush
@endif
@push('datatable')
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
@endpush
