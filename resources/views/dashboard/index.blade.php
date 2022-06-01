@extends('dashboard/template/index')
@section('title', 'Dashboard')
@section('content')

    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">weekend</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Message</p>
                        <h4 class="mb-0">{{ $data['message'] }}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    @if (Auth::user()->level == 'admin')
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">User</p>
                            <h4 class="mb-0">{{ $data['user'] }}</h4>
                        </div>
                    @endif
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">toys</i>
                    </div>
                    @if (Auth::user()->level == 'admin')
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Car</p>
                            <h4 class="mb-0">{{ $data['car'] }}</h4>
                        </div>
                    @endif
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">

                </div>
            </div>
        </div>
    </div>


@endsection
