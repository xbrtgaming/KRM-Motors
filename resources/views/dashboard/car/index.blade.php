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
                        data-bs-toggle="modal" data-bs-target="#car_add" style="margin-right:5px;">add
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="car_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-normal" id="exampleModalLabel">
                                        Add Car</h5>
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
                                                <textarea id="editor2" name="specification" rows="10" cols="50"></textarea>
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
                                <th>price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['car'] as $cars)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset('storage') }}/{{ $cars->image }}" alt="" width="100px"></td>
                                    <td>{{ $cars->type }}</td>
                                    <td>{{ $cars->year }}</td>
                                    <td>{{ Str::upper($cars->category) }}</td>
                                    <td>{{ Str::upper($cars->status) }}</td>
                                    <td>Rp {{ number_format($cars->price, 2) }}</td>
                                    <td>
                                        <a href="{{ route('car_detail', $cars->id) }}"
                                            class="btn btn-linkedin fas fa-eye btn-sm"></a>
                                        <a href="{{ route('car_edit', $cars->id) }}"
                                            class="btn btn-primary btn-sm fas fa-edit"></a>


                                        <button type="button" class="btn bg-gradient-danger btn-sm fas fa-trash"
                                            data-bs-toggle="modal" data-bs-target="#car_delete{{ $cars->id }}">
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="car_delete{{ $cars->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title font-weight-normal" id="exampleModalLabel">
                                                            Delete User</h5>
                                                        <button type="button" class="btn-close text-dark"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p> Delete <b>{{ $cars->type }}</b> </p>
                                                        Are you sure?
                                                        <li><b>Yes</b> to delete</li>
                                                        <li><b>Cancel</b> to cancel</li>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn bg-gradient-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('car_delete', $cars->id) }}" method="GET"
                                                            class="d-inline">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn bg-gradient-danger">Yes</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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
