@extends('customer.layouts.main')
@section('content')
    <div class="container-xxl bg-white p-0">
        <!-- Page Header Start -->
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-1.jpg);">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Đăng nhập</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Đăng nhập</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        <!-- Booking Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Đăng nhập</h6>
                    <h1 class="mb-5"> <span class="text-primary text-uppercase"></span></h1>
                </div>
                <div class="row g-5">
                    <div class="col-lg-12">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <form action="{{ route('customer.postLogin') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="email" placeholder="Email" name="email">
                                            <label for="email">Email của bạn</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="password" placeholder="Mật khẩu" name="password">
                                            <label for="password">Mật khẩu</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <button class="btn btn-secondary w-100 py-3" type="submit">Đăng nhập</button>
                                    </div>
                                    <div class="col-6">
                                        <a class="btn btn-primary w-100 py-3" href="{{ route('customer.showRegister') }}">Đăng ký</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Booking End -->

        <!-- Newsletter Start -->
        <div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="row justify-content-center">
                <div class="col-lg-10 border rounded p-1">
                    <div class="border rounded text-center p-1">
                        <div class="bg-white rounded text-center p-5">
                            <h4 class="mb-4"> <span class="text-primary text-uppercase"></span></h4>
                            <div class="position-relative mx-auto" style="max-width: 400px;">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter Start -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
@endsection
