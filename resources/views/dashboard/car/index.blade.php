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
                        <button type="submit">Print</button>
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
                                    @if ($errors->any())
                                        <div class="alert alert-danger text-light">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{ route('car_add') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="input-group input-group-outline my-3">
                                                <label>Image &nbsp;</label>
                                                <input type="file" name="image">
                                            </div>
                                            <div class="input-group input-group-static mb-4">
                                                <label for="brand">Brand &nbsp;</label>
                                                <select name="brand">
                                                    @foreach ($data['brand'] as $brands)
                                                        <option value="{{ $brands->brand }}">{{ $brands->brand }}
                                                        </option>
                                                    @endforeach
                                                </select>
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
                                                    @foreach ($data['category'] as $category)
                                                        <option value="{{ $category->name }}">{{ $category->name }}
                                                        </option>
                                                    @endforeach
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
                                                <textarea id="editor" name="specification" rows="10" cols="50"></textarea>
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
                                <th>Brand</th>
                                <th>Year</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['car'] as $cars)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset('storage') }}/{{ $cars->image }}" alt="" width="48px"></td>
                                    <td>{{ $cars->type }}</td>
                                    <td>{{ $cars->brand }}</td>
                                    <td>{{ $cars->year }}</td>
                                    <td>{{ Str::upper($cars->category) }}</td>
                                    <td>
                                        @if ($cars->status == 'sold')
                                            <span
                                                class="badge badge-sm bg-gradient-danger">{{ Str::upper($cars->status) }}
                                            </span>
                                        @elseif ($cars->status == 'ready')
                                            <span
                                                class="badge badge-sm bg-gradient-success">{{ Str::upper($cars->status) }}
                                            </span>
                                        @elseif ($cars->status == 'not_ready')
                                            <span class="badge badge-sm bg-gradient-warning">NOT READY
                                        @endif
                                    </td>
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
                                                            Delete Car</h5>
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

@push('datatable')
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
@endpush

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
