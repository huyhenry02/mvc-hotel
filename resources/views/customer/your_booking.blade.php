@extends('customer.layouts.main')
@section('content')
    <div class="container-xxl bg-white p-0">
        <!-- Page Header Start -->
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-1.jpg);">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Đơn đặt phòng</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Đơn đặt phòng của bạn</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- Booking List Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Đơn đặt phòng của bạn</h6>
                    <h1 class="mb-5">Danh sách các đơn đặt phòng</h1>
                </div>
                <div class="row g-5">
                    <div class="col-lg-12">
                        <table class="table table-bordered text-center">
                            <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Loại phòng</th>
                                <th>Ngày Check-In</th>
                                <th>Ngày Check-Out</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $bookings as $key => $booking)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $booking->roomType->name ?? '' }}</td>
                                    <td>{{ $booking->check_in_date ?? '' }}</td>
                                    <td>{{ $booking->check_out_date ?? '' }}</td>
                                    <td>
                                        @switch($booking->status)
                                            @case('pending')
                                                <span class="badge bg-warning">Chờ xử lý</span>
                                                @break

                                            @case('approved')
                                                <span class="badge bg-success">Đã phê duyệt</span>
                                                @break

                                            @case('rejected')
                                                <span class="badge bg-danger">Bị từ chối</span>
                                                @break

                                            @case('completed')
                                                <span class="badge bg-primary">Hoàn thành</span>
                                                @break

                                            @default
                                                <span class="badge bg-secondary">Không xác định</span>
                                        @endswitch
                                    </td>

                                    <td>
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#bookingDetailModal"
                                                data-room-type="{{ $booking->roomType->name ?? '' }}"
                                                data-check-in="{{ $booking->check_in_date ?? '' }}"
                                                data-check-out="{{ $booking->check_out_date ?? '' }}"
                                                data-status="{{ $booking->status ?? '' }}"
                                                data-total-price="{{ $booking->total_price ?? '' }}"
                                                data-check-in-date="{{ $booking->check_in_date ?? '' }}"
                                                data-check-out-date="{{ $booking->check_out_date ?? '' }}"
                                                data-adult-people-number="{{ $booking->adult_people_number ?? '' }}"
                                                data-child-people-number="{{ $booking->child_people_number ?? '' }}"
                                                data-room="{{ $booking->room->code ?? '' }}"
                                                data-name-booking="{{ $booking->name_booking ?? '' }}"
                                                data-email-booking="{{ $booking->email_booking ?? '' }}"
                                                data-code="{{ $booking->code ?? '' }}"
                                                data-note="{{ $booking->note ?? 'Không có ghi chú' }}"
                                        >
                                            Xem chi tiết
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Booking List End -->

        <!-- Booking Detail Modal -->
        <div class="modal fade" id="bookingDetailModal" tabindex="-1" aria-labelledby="bookingDetailModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bookingDetailModalLabel">Chi tiết đơn đặt phòng</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Mã đơn đặt phòng:</h6>
                                <p id="modalCode">-</p>
                            </div>
                            <div class="col-md-6">
                                <h6>Loại phòng:</h6>
                                <p id="modalRoomType">-</p>
                            </div>
                            <div class="col-md-6">
                                <h6>Mã phòng:</h6>
                                <p id="modalRoomCode">-</p>
                            </div>
                            <div class="col-md-6">
                                <h6>Ngày Check-In:</h6>
                                <p id="modalCheckInDate">-</p>
                            </div>
                            <div class="col-md-6">
                                <h6>Ngày Check-Out:</h6>
                                <p id="modalCheckOutDate">-</p>
                            </div>
                            <div class="col-md-6">
                                <h6>Số lượng người lớn:</h6>
                                <p id="modalAdultPeopleNumber">-</p>
                            </div>
                            <div class="col-md-6">
                                <h6>Số lượng trẻ em:</h6>
                                <p id="modalChildPeopleNumber">-</p>
                            </div>
                            <div class="col-md-6">
                                <h6>Tên người đặt:</h6>
                                <p id="modalNameBooking">-</p>
                            </div>
                            <div class="col-md-6">
                                <h6>Email:</h6>
                                <p id="modalEmailBooking">-</p>
                            </div>
                            <div class="col-md-6">
                                <h6>Trạng thái:</h6>
                                <p id="modalStatus">-</p>
                            </div>
                            <div class="col-md-6">
                                <h6>Tổng tiền:</h6>
                                <p id="modalTotalPrice">-</p>
                            </div>
                            <div class="col-12">
                                <h6>Ghi chú:</h6>
                                <p id="modalNote">-</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Booking Detail Modal End -->
        <div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="row justify-content-center">
                <div class="col-lg-10 border rounded p-1">
                    <div class="border rounded text-center p-1">
                        <div class="bg-white rounded text-center p-5">
                            <h4 class="mb-4"><span class="text-primary text-uppercase"></span></h4>
                            <div class="position-relative mx-auto" style="max-width: 400px;">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const bookingDetailModal = document.getElementById('bookingDetailModal');

            bookingDetailModal.addEventListener('show.bs.modal', function (event) {
                // Nút kích hoạt modal
                const button = event.relatedTarget;

                // Lấy dữ liệu từ thuộc tính data-
                const roomType = button.getAttribute('data-room-type');
                const roomCode = button.getAttribute('data-room');
                const checkInDate = button.getAttribute('data-check-in-date');
                const checkOutDate = button.getAttribute('data-check-out-date');
                const adultPeopleNumber = button.getAttribute('data-adult-people-number');
                const childPeopleNumber = button.getAttribute('data-child-people-number');
                const nameBooking = button.getAttribute('data-name-booking');
                const emailBooking = button.getAttribute('data-email-booking');
                const status = button.getAttribute('data-status');
                const totalPrice = button.getAttribute('data-total-price');
                const note = button.getAttribute('data-note');
                const code = button.getAttribute('data-code');

                // Cập nhật dữ liệu vào modal
                document.getElementById('modalRoomType').textContent = roomType;
                document.getElementById('modalRoomCode').textContent = roomCode;
                document.getElementById('modalCheckInDate').textContent = checkInDate;
                document.getElementById('modalCheckOutDate').textContent = checkOutDate;
                document.getElementById('modalAdultPeopleNumber').textContent = adultPeopleNumber;
                document.getElementById('modalChildPeopleNumber').textContent = childPeopleNumber;
                document.getElementById('modalNameBooking').textContent = nameBooking;
                document.getElementById('modalEmailBooking').textContent = emailBooking;
                document.getElementById('modalStatus').textContent = status;
                document.getElementById('modalTotalPrice').textContent = totalPrice;
                document.getElementById('modalNote').textContent = note;
                document.getElementById('modalCode').textContent = code;
            });
        });

    </script>
@endsection
