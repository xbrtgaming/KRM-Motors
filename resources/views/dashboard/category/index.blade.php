@extends('dashboard/template/index')
@section('title', 'Category')
@section('content')

    <div class="container">
        <h4>Category Database</h1>
            <div class="card">
                <div class="card-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-linkedin btn-sm float-end material-icons"
                        onClick="window.location.reload()">refresh</button>
                    <button type="button" class="btn bg-gradient-success btn-sm float-end material-icons"
                        data-bs-toggle="modal" data-bs-target="#category_add" style="margin-right:5px;">add
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="category_add" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-normal" id="exampleModalLabel">
                                        Add Category</h5>
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
                                    <form action="{{ route('category_add') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" name="name">
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $categories)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $categories->name }}</td>
                                    <td>
                                        <button type="button" class="btn bg-gradient-danger btn-sm fas fa-trash"
                                            data-bs-toggle="modal" data-bs-target="#category_delete{{ $categories->id }}">
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="category_delete{{ $categories->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title font-weight-normal" id="exampleModalLabel">
                                                            Delete Category</h5>
                                                        <button type="button" class="btn-close text-dark"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p> Delete <b>{{ $categories->name }}</b> </p>
                                                        Are you sure?
                                                        <li><b>Yes</b> to delete</li>
                                                        <li><b>Cancel</b> to cancel</li>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn bg-gradient-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('category_delete', $categories->id) }}"
                                                            method="GET" class="d-inline">
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
