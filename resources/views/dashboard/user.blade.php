@extends('dashboard/template/index')
@section('title', 'User')
@section('content')

    <div class="container">
        <h4>User Database</h1>
            <div class="card">
                <div class="card-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-linkedin btn-sm float-end"
                        onClick="window.location.reload()">Reload</button>
                    <button type="button" class="btn bg-gradient-success btn-sm float-end" data-bs-toggle="modal"
                        data-bs-target="#add" style="margin-right:5px;">
                        Add
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-normal" id="exampleModalLabel">
                                        Edit User</h5>
                                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="#" method="POST">
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
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn bg-gradient-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn bg-gradient-success">Confirm</button>
                                </div>
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
                                        <button type="button" class="btn bg-gradient-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            Edit
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <form action="#" method="POST">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="input-group input-group-outline my-3">
                                                                    <label class="form-label">Name</label>
                                                                    <input type="text" class="form-control" name="name">
                                                                </div>
                                                                <div class="input-group input-group-outline my-3">
                                                                    <label class="form-label">Number</label>
                                                                    <input type="number" class="form-control"
                                                                        name="number">
                                                                </div>
                                                                <div class="input-group input-group-outline my-3">
                                                                    <label class="form-label">Email</label>
                                                                    <input type="email" class="form-control" name="email">
                                                                </div>
                                                                <div class="input-group input-group-static mb-4">
                                                                    <label for="level">Level &nbsp;</label>
                                                                    <select name="level">
                                                                        <option>1</option>
                                                                        <option value="user">User</option>
                                                                        <option value="admin">Admin</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn bg-gradient-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn bg-gradient-primary">Save
                                                            changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="btn btn-warning btn-sm">Reset Password</a>
                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>


@endsection
