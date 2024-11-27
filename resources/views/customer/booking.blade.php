@extends('customer.layouts.main')
@section('content')
    <div class="container-xxl bg-white p-0">
        <!-- Page Header Start -->
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-1.jpg);">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Đặt phòng</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Đặt phòng</li>
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
                    <h6 class="section-title text-center text-primary text-uppercase">Đặt phòng</h6>
                    <h1 class="mb-5">Hãy chọn  <span class="text-primary text-uppercase">phòng hợp lý</span></h1>
                </div>
                <div class="row g-5">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="img/about-1.jpg" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="img/about-2.jpg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="img/about-3.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="img/about-4.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <form action="{{ route('customer.postBooking') }}" method="post">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" placeholder="Tên của bạn" name="name_booking">
                                            <label for="name">Tên của bạn</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email_booking" placeholder="Email của bạn" name="email_booking">
                                            <label for="email_booking">Email của bạn</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="date" class="form-control datetimepicker-input" id="checkin" name="check_in_date" placeholder="Check In" />
                                            <label for="checkin">Check In</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="date" class="form-control datetimepicker-input" id="checkout" name="check_out_date" placeholder="Check Out" />
                                            <label for="checkout">Check Out</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" id="adult_people_number" placeholder="Số lượng người lớn" name="adult_people_number">
                                            <label for="adult_people_number">Số lượng người lớn</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" id="child_people_number" placeholder="Số lượng trẻ em" name="child_people_number">
                                            <label for="child_people_number">Số lượng trẻ em</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <select class="form-select" id="select3" name="room_type_id">
                                                @foreach( $roomTypes as $roomType)
                                                    <option value="{{ $roomType->id }}">{{ $roomType->name ?? '' }}</option>
                                                @endforeach
                                            </select>
                                            <label for="select3">Chọn loại phòng</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Ghi chú" id="message" name="note" style="height: 100px"></textarea>
                                            <label for="message">Ghi chú</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Đặt phòng ngay</button>
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
    <style>
        .datetimepicker-input {
            cursor: pointer;
        }

    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Khởi tạo DatePicker cho Checkin
            const checkinPicker = new tempusDominus.TempusDominus(document.getElementById('checkin'), {
                display: {
                    components: {
                        calendar: true,
                        date: true,
                        month: true,
                        year: true,
                        hours: true,
                        minutes: true,
                        seconds: false,
                        useTwentyfourHour: true,
                    },
                },
                defaultDate: null, // Đặt giá trị mặc định là null
            });

            // Khởi tạo DatePicker cho Checkout
            const checkoutPicker = new tempusDominus.TempusDominus(document.getElementById('checkout'), {
                display: {
                    components: {
                        calendar: true,
                        date: true,
                        month: true,
                        year: true,
                        hours: true,
                        minutes: true,
                        seconds: false,
                        useTwentyfourHour: true,
                    },
                },
                defaultDate: null, // Đặt giá trị mặc định là null
            });

            // Ràng buộc ngày Check Out phải sau Check In
            document.getElementById('checkin').addEventListener('change', function (e) {
                const checkinDate = new Date(e.target.value);
                checkoutPicker.updateOptions({
                    restrictions: {
                        minDate: checkinDate,
                    },
                });
            });
        });


    </script>
@endsection
