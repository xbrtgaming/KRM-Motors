@extends('dashboard/template/index')
@section('title', 'Car')
@section('content')

    <div class="container">
        <h4>Car Detail</h4>
        <div class="card mb-3" style="max-width: 100%;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('storage') }}/{{ $car->image }}" class="img-fluid rounded-start" width="300px"
                        alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $car->type }}</h5>
                        <p>Price : {{ $car->price }}</p>
                        <p>Year : {{ $car->year }}</p>
                        <p>Range : {{ $car->range }}</p>
                        <p>Category : {{ $car->category }}</p>
                        <p>Status : {{ $car->status }}</p>
                        <p>Specification : {!! $car->specification !!}</p>
                        <p class="card-text">
                            <small class="text-muted">Created At :
                                {{ $car->created_at }} | </small>
                            <small class="text-muted">Last Update :
                                {{ $car->updated_at }}</small>
                        </p>
                        <a href="{{ route('car_edit', $car->id) }}" class="btn btn-primary btn-sm">Edit</a>

                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
