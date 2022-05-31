@extends('dashboard/template/index')
@section('title', 'Message')
@section('content')

    <div class="container">
        <h4>Message Database</h1>
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
                                        Add Message</h5>
                                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('message_add') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label">Order</label>
                                                <input type="text" class="form-control" name="order">
                                            </div>
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email">
                                            </div>
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label">Number</label>
                                                <input type="number" class="form-control" name="number">
                                            </div>
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label">Message</label>
                                                <input type="text" class="form-control" name="message">
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
                                <th>Order</th>
                                <th>Email</th>
                                <th>Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($message as $messages)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $messages->order }}</td>
                                    <td>{{ $messages->email }}</td>
                                    <td>{{ $messages->number }}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn bg-gradient-info btn-sm fas fa-envelope"
                                            data-bs-toggle="modal" data-bs-target="#message{{ $messages->id }}">
                                        </button>

                                        <div class="modal fade" id="message{{ $messages->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title font-weight-normal" id="exampleModalLabel">
                                                            Message</h5>
                                                        <button type="button" class="btn-close text-dark"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{ $messages->message }}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn bg-gradient-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                                        <button type="button" class="btn bg-gradient-success btn-sm fas fa-check"
                                            data-bs-toggle="modal" data-bs-target="#user_delete{{ $messages->id }}">
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="user_delete{{ $messages->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title font-weight-normal" id="exampleModalLabel">
                                                            Cornfirm Message</h5>
                                                        <button type="button" class="btn-close text-dark"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p> Confirm <b>{{ $messages->email }}</b> </p>
                                                        Are you sure?
                                                        <li><b>Yes</b> to confirm</li>
                                                        <li><b>Cancel</b> to cancel</li>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn bg-gradient-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('message_confirm', $messages->id) }}"
                                                            method="GET" class="d-inline">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn bg-gradient-success">Yes</button>
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
@push('datatable')
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
@endpush
