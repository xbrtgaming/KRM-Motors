@extends('dashboard/template/index')
@section('title', 'Car')
@section('content')

    <div class="container">
        <h4>Car Database</h1>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('print') }}" method="GET" class="d-inline">
                        <label>Find by Date </label>
                        <input type="date" name="start_date">
                        <input type="date" name="end_date">
                        <button type="submit" class="btn btn-dark btn-sm">Search</button>
                    </form>


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
                                    <form action="{{ route('car_add') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="input-group input-group-outline my-3">
                                                <label>Image &nbsp;</label>
                                                <input type="file" name="image">
                                            </div>
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label">Type</label>
                                                <input type="text" class="form-control" name="type">
                                            </div>
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label">Price</label>
                                                <input type="number" class="form-control" name="price">
                                            </div>
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label">Year</label>
                                                <input type="number" class="form-control" name="year">
                                            </div>
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label">Range</label>
                                                <input type="text" class="form-control" name="range">
                                            </div>
                                            <div class="input-group input-group-static mb-4">
                                                <label for="category">Category &nbsp;</label>
                                                <select name="category">
                                                    <option value="suv">SUV</option>
                                                </select>
                                            </div>
                                            <div class="input-group input-group-static mb-4">
                                                <label for="status">Status &nbsp;</label>
                                                <select name="status">
                                                    <option value="sold">Sold</option>
                                                    <option value="ready">Ready</option>
                                                    <option value="not_ready">Not Ready</option>
                                                </select>
                                            </div>
                                            <div class="container">
                                                <label for="specification">Specification</label>
                                                <textarea id="editor" class="form-control" name="specification" rows="10" cols="50"></textarea>
                                                <script src="{{ asset('ckeditor5') }}/ckeditor.js"></script>
                                                <script>
                                                    ClassicEditor
                                                        .create(document.querySelector('#editor'))
                                                        .then(editor => {
                                                            console.log(editor);
                                                        })
                                                        .catch(error => {
                                                            console.error(error);
                                                        });
                                                </script>
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
                                <th>Image</th>
                                <th>Type</th>
                                <th>Year</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($car as $cars)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset('storage') }}/{{ $cars->image }}" alt="" width="100px"></td>
                                    <td>{{ $cars->type }}</td>
                                    <td>{{ $cars->year }}</td>
                                    <td>{{ $cars->category }}</td>
                                    <td>{{ $cars->status }}</td>
                                    <td>
                                        <a href="{{ route('car_detail', $cars->id) }}"
                                            class="btn btn-linkedin fas fa-eye btn-sm"></a>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn bg-gradient-primary btn-sm fas fa-pencil-alt"
                                            data-bs-toggle="modal" data-bs-target="#user_edit{{ $cars->id }}">
                                        </button>

                                        <div class="modal fade" id="user_edit{{ $cars->id }}" tabindex="-1"
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
                                                            <div class="alert alert-danger">
                                                                <ul>
                                                                    @foreach ($errors->all() as $error)
                                                                        <li>{{ $error }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endif
                                                        <form action="{{ route('user_edit', $cars->id) }}" method="POST">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="input-group input-group-outline my-3">
                                                                    <label class="form-label">Name</label>
                                                                    <input type="text" class="form-control" name="name"
                                                                        value="{{ $cars->name }}">
                                                                </div>
                                                                <div class="input-group input-group-outline my-3">
                                                                    <label class="form-label">Number</label>
                                                                    <input type="number" class="form-control"
                                                                        name="number" value="{{ $cars->number }}">
                                                                </div>
                                                                <div class="input-group input-group-outline my-3">
                                                                    <label class="form-label">Email</label>
                                                                    <input type="email" class="form-control" name="email"
                                                                        value="{{ $cars->email }}">
                                                                </div>
                                                                <div class="input-group input-group-static mb-4">
                                                                    <label for="level">Level &nbsp;</label>
                                                                    <select name="level">
                                                                        <option>{{ $cars->level }}</option>
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
                                        <form action="{{ route('user_delete', $cars->id) }}" method="GET"
                                            class="d-inline">
                                            <button type="button" class="btn bg-gradient-danger btn-sm fas fa-trash"
                                                data-bs-toggle="modal" data-bs-target="#user_delete{{ $cars->id }}">
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="user_delete{{ $cars->id }}" tabindex="-1"
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
                                                            <p> Delete <b>{{ $cars->name }}</b> </p>
                                                            Are you sure?
                                                            <li><b>Yes</b> to delete</li>
                                                            <li><b>Cancel</b> to cancel</li>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn bg-gradient-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <form action="{{ route('user_delete', $cars->id) }}"
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
            toastr['error']('Failed to update user', 'Failed')
        </script>
    @endpush
@endif
