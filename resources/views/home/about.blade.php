@extends('home/template/index')
@section('title', 'About | KRM Motors')
@section('content')
   
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 pt-4" style="min-height: 400px;">
                    <div class="position-relative h-100 wow fadeIn" data-wow-delay="0.1s">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('carserv') }}/img/KRM_MOTORS.png"
                            style="object-fit: cover;" alt="">
                        <div class="position-absolute top-0 end-0 mt-n4 me-n4 py-4 px-5"
                            style="background: rgba(0, 0, 0, .08);">
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h6 class="text-primary text-uppercase">About Us</h6>
                    <h1 class="mb-4"><span class="text-primary">KRM Motors</span> </h1>
                    <p class="mb-4">Providing imported car purchasing services with the best, easiest, and safest facilities among its competitors. KRM Motors comes with providing many variants of cars and you can order a car according to your wishes.
                    KRM Motors has been established for 6 years and has won 10 national and international motorcycle federation awards
                    </p>
                    <div class="row g-4 mb-3 pb-3">
                        
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


   

@endsection
