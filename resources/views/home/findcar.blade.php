@extends('home/template/index')
@section('title', 'Home | KRM Motors')
@section('content')

    <div class="container mt-5">
        <div class="row row-cols-1 row-cols-md-5 g-4">

            @foreach ($cars as $car)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('storage') }}/{{ $car->image }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $car->type }}</h5>

                            <p>Year : {{ $car->year }}</p>
                            <p>Rp {{ number_format($car->price, 2) }}</p>
                            @if ($car->status == 'sold')
                                <strong class="card-text text-danger">Sold</strong>
                            @elseif($car->status == 'not_ready')
                                <strong class="card-text text-warning">Not Ready</strong>
                            @elseif ($car->status == 'ready')
                                <strong class="card-text text-success">Ready</strong><br>
                                <button class="btn btn-primary btn-sm mt-3">View</button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
