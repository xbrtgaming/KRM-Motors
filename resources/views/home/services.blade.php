@extends('home/template/index')
@section('title', 'Services | KRM Motors')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url({{ asset('carserv') }}/img/carousel-bg-2.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Services</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Services</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Service Start -->
    <div class="container-xxl service py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-primary text-uppercase">Our Services</h6>
                <h1 class="mb-5">After Sales Service</h1>
            </div>
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-lg-4">
                    <div class="nav w-100 nav-pills me-4">
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4 active"
                            data-bs-toggle="pill" data-bs-target="#tab-pane-1" type="button">
                            <i class="fa fa-car-side fa-2x me-3"></i>
                            <h4 class="m-0">General Check</h4>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4" data-bs-toggle="pill"
                            data-bs-target="#tab-pane-2" type="button">
                            <i class="fa fa-car fa-2x me-3"></i>
                            <h4 class="m-0">Engine Service</h4>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4" data-bs-toggle="pill"
                            data-bs-target="#tab-pane-3" type="button">
                            <i class="fa fa-cog fa-2x me-3"></i>
                            <h4 class="m-0">Part Replacement</h4>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-0" data-bs-toggle="pill"
                            data-bs-target="#tab-pane-4" type="button">
                            <i class="fa fa-oil-can fa-2x me-3"></i>
                            <h4 class="m-0">Oil Changing</h4>
                        </button>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="tab-content w-100">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100"
                                            src="{{ asset('carserv') }}/img/service-1.jpg" style="object-fit: cover;"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-3">Free general check-up </h3>
                                    <p class="mb-4">KRM Motors provides free general check-up services to consumers who have purchased a car at Krm Motors. This service is valid for 5 years</p>
                                    <p><i class="fa fa-check text-success me-3"></i>Engine Oil</p>
                                    <p><i class="fa fa-check text-success me-3"></i>Diagnostic Scan</p>
                                    <p><i class="fa fa-check text-success me-3"></i>Water Fluid Check</p>
                                    <a href="" class="btn btn-primary py-3 px-5 mt-3">Read More<i
                                            class="fa fa-arrow-right ms-3"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100"
                                            src="{{ asset('carserv') }}/img/service-2.jpg" style="object-fit: cover;"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-3">After Sales Service</h3>
                                    <p class="mb-4">Providing service services for after sales consumers for all types of cars that have been sold by KRM Motors</p>
                                    <a href="" class="btn btn-primary py-3 px-5 mt-3">Read More<i
                                            class="fa fa-arrow-right ms-3"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100"
                                            src="{{ asset('carserv') }}/img/service-3.jpg" style="object-fit: cover;"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-3">Replacement Part Service</h3>
                                    <p class="mb-4">Provide replacement service for consumer vehicle parts. And if ordering parts takes a long time, we will provide a replacement car while waiting for the parts to be replaced.</p>
                                    <a href="" class="btn btn-primary py-3 px-5 mt-3">Read More<i
                                            class="fa fa-arrow-right ms-3"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-4">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100"
                                            src="{{ asset('carserv') }}/img/service-4.jpg" style="object-fit: cover;"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-3">Oil Changing Services</h3>
                                    <p class="mb-4">provides oil change services from engine oil, transmission oil, power steering oil and others for all types of car vehicles</p>
                                    <p><i class="fa fa-check text-success me-3"></i>Fastron Pertamina</p>
                                    <p><i class="fa fa-check text-success me-3"></i>Repsol Oil</p>
                                    <p><i class="fa fa-check text-success me-3"></i>Motul Oil</p>
                                    <p><i class="fa fa-check text-success me-3"></i>Shell Oil</p>
                                    <a href="" class="btn btn-primary py-3 px-5 mt-3">Read More<i
                                            class="fa fa-arrow-right ms-3"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Booking Start -->
    <div class="container-fluid bg-secondary booking my-5 wow fadeInUp" data-wow-delay="0.1s">
    


    
@endsection
