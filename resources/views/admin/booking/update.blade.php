@extends('admin.layouts.main')
@section('content')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="table-container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="table-heading">
                            <h3>Chỉnh sửa <strong>Đơn đặt phòng</strong></h3>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('booking.postUpdate', $booking->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name_booking" class="form-label">Tên người đặt</label>
                                <input type="text" name="name_booking" id="name_booking" class="form-control"
                                       value="{{ $booking->name_booking }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="email_booking" class="form-label">Email người đặt</label>
                                <input type="email" name="email_booking" id="email_booking" class="form-control"
                                       value="{{ $booking->email_booking }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="note" class="form-label">Ghi chú</label>
                                <textarea name="note" id="note" rows="4" class="form-control" placeholder="Nhập ghi chú">{{ $booking->note }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="adult_people_number" class="form-label">Số người lớn</label>
                                <input type="number" name="adult_people_number" id="adult_people_number" class="form-control"
                                       value="{{ $booking->adult_people_number }}" min="1" required>
                            </div>

                            <div class="mb-3">
                                <label for="child_people_number" class="form-label">Số trẻ em</label>
                                <input type="number" name="child_people_number" id="child_people_number" class="form-control"
                                       value="{{ $booking->child_people_number }}" min="0">
                            </div>

                            <div class="mb-3">
                                <label for="check_in_date" class="form-label">Ngày Check-In</label>
                                <input type="date" name="check_in_date" id="check_in_date" class="form-control"
                                       value="{{ $booking->check_in_date }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="check_out_date" class="form-label">Ngày Check-Out</label>
                                <input type="date" name="check_out_date" id="check_out_date" class="form-control"
                                       value="{{ $booking->check_out_date }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="room_id" class="form-label">Phòng</label>
                                <select name="room_id" id="room_id" class="form-control">
                                    <option value="{{ $booking->room_id ?? '' }}" selected>{{ $booking->room_id ?? 'Chọn phòng' }}</option>
                                    @foreach( $rooms as $room )
                                        <option value="{{ $room->id }}">
                                            {{ $room->code }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="room_type_id" class="form-label">Loại phòng</label>
                                <select name="room_type_id" id="room_type_id" class="form-control">
                                    @foreach($roomTypes as $type)
                                        <option value="{{ $type->id }}"
                                            {{ $booking->room_type_id == $type->id ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Trạng thái</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                                    <option value="approved" {{ $booking->status == 'approved' ? 'selected' : '' }}>Đã phê duyệt</option>
                                    <option value="rejected" {{ $booking->status == 'rejected' ? 'selected' : '' }}>Bị từ chối</option>
                                    <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>Hoàn thành</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="payment_status" class="form-label">Trạng thái thanh toán</label>
                                <select name="payment_status" id="payment_status" class="form-control">
                                    <option value="pending" {{ $booking->payment_status == 'pending' ? 'selected' : '' }}>Chưa thanh toán</option>
                                    <option value="paid" {{ $booking->payment_status == 'paid' ? 'selected' : '' }}>Đã thanh toán</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="total_price" class="form-label">Tổng giá</label>
                                <input type="number" name="total_price" id="total_price" class="form-control"
                                       value="{{ $booking->total_price }}" required>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <a href="{{ route('booking.showIndex') }}" class="btn btn-danger">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
