@extends('admin.layouts.main')
@section('content')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="table-container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="table-heading">
                            <h3>Chỉnh Sửa <strong>Hóa Đơn</strong></h3>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('transaction.showSave', $transaction->id)}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="booking_id" class="form-label">Mã Đơn</label>
                                <select name="booking_id" id="booking_id" class="form-select" required>
                                    <option value="" disabled selected>Select a Booking</option>
                                    @foreach($bookings as $booking)
                                        <option value="{{ $booking->id }}" {{ $booking->id == $transaction->booking_id ? 'selected' : '' }}>
                                            {{ $booking->id }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="payment_method" class="form-label">Phương Thức Thanh Toán</label>
                                <select name="payment_method" class="form-control">
                                    <option value="credit card">
                                        Credit Card
                                    </option>
                                    <option value="paypal">
                                        Paypal
                                    </option>
                                    <option value="bank_transfer">
                                        Bank Transfer
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="payment_date" class="form-label">Ngày Thanh Toán</label>
                                <input type="date" name="payment_date" id="payment_date" {{$transaction->payment_date}} class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="transaction_status" class="form-label">
                                    Trạng Thái
                                </label>
                                <select name="transaction_status"  class="form-control">
                                    <option value="success">
                                        Thành Công
                                    </option>
                                    <option value="failed">
                                        Lỗi
                                    </option>
                                    <option value="pending">
                                        Chưa Thanh Toán
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="amount" class="form-label">Số Lượng</label>
                                <input type="number"  name="amount" id="amount" {{$transaction->amount}} class="form-control">
                            </div>
                            <div style="float: right">
                                <button type="submit" class="btn btn-primary">Tạo mới</button>
                                <a href="{{route('transaction.showIndex')}}" class="btn btn-danger">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
