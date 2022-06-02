@extends('home/template/index')
@section('title', 'Car Detail | KRM Motors')
@section('content')

    <div class="container">
        <div class="card mb-3 mt-5">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('storage') }}/{{ $car->image }}" class="img-fluid rounded-start" alt="Car">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $car->type }}</h5>
                        <p class="card-text">Price : Rp {{ number_format($car->price, 2) }} | Total Order :
                            {{ $order }}</p>
                        <p class="card-text">Year : {{ $car->year }}</p>
                        <p class="card-text">Range : {{ $car->range }}</p>
                        <p class="card-text">Category : {{ Str::upper($car->category) }}</p>
                        <p class="card-text">{!! $car->specification !!}</p>
                        <p class="card-text"><small class="text-muted">Created at {{ $car->created_at }} | Last
                                update {{ $car->updated_at }}</small>
                        </p>
                        <a href="{{ route('find_car') }}" class="btn btn-primary">Back</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Book this car
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Book Car</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('message_send') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <label for="order">Car ID</label>
                                            <input type="text" id="order" class="form-control mb-2" name="order"
                                                value="{{ $car->id }}" readonly>
                                            <label for="email">Email</label>
                                            <input type="email" id="email" class="form-control mb-2" name="email"
                                                value="{{ Auth::user()->email }}" readonly>
                                            <label for="number">Number</label>
                                            <input type="number" id="number" class="form-control mb-2" name="number"
                                                value="{{ Auth::user()->number }}" readonly>
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">
                                                    Message</label>
                                                <textarea class="form-control  mb-2" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Send</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
            toastr['error']('You can only order once', 'Failed')
        </script>
    @endpush
@endif
