@extends('admin.layouts.main')
@section('content')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="table-container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="table-heading">
                            <h3>Thêm mới <strong>Hóa Đơn</strong></h3>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('transaction.postCreate') }}" method="post">
                            @csrf
                            <!-- Mã Đơn -->
                            <div class="mb-3">
                                <label for="booking_id" class="form-label">Mã Đơn</label>
                                <select name="booking_id" id="booking_id" class="form-select" required>
                                    <option value="" disabled selected>Chọn mã đơn</option>
                                    @foreach($bookings as $booking)
                                        <option value="{{ $booking->id }}">{{ $booking->code }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Phương Thức Thanh Toán -->
                            <div class="mb-3">
                                <label for="payment_method" class="form-label">Phương Thức Thanh Toán</label>
                                <select name="payment_method" id="payment_method" class="form-control" required>
                                    <option value="credit_card">Credit Card</option>
                                    <option value="paypal">Paypal</option>
                                    <option value="bank_transfer">Bank Transfer</option>
                                </select>
                            </div>
                            <!-- Ngày Thanh Toán -->
                            <div class="mb-3">
                                <label for="payment_date" class="form-label">Ngày Thanh Toán</label>
                                <input type="date" name="payment_date" id="payment_date" class="form-control" required>
                            </div>
                            <!-- Trạng Thái -->
                            <div class="mb-3">
                                <label for="transaction_status" class="form-label">Trạng Thái</label>
                                <select name="transaction_status" id="transaction_status" class="form-control" required>
                                    <option value="success">Thành Công</option>
                                    <option value="failed">Lỗi</option>
                                    <option value="pending">Chưa Thanh Toán</option>
                                </select>
                            </div>
                            <!-- Số Lượng -->
                            <div class="mb-3">
                                <label for="amount" class="form-label">Số Tiền thanh toán</label>
                                <input type="number" name="amount" id="amount" class="form-control" required>
                            </div>
                            <!-- Nút Lưu và Hủy -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Tạo mới</button>
                                <a href="{{ route('transaction.showIndex') }}" class="btn btn-danger">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
