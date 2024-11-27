@php use App\Models\User ; @endphp
@extends('admin.layouts.main')
@section('content')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="table-container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="table-heading">
                            <h3>
                                Danh Sách <strong>Đơn đặt phòng</strong>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="d-none d-xl-table-cell">#</th>
                            <th class="d-none d-xl-table-cell">Mã</th>
                            <th class="d-none d-xl-table-cell">Khách hàng</th>
                            <th class="d-none d-xl-table-cell">Loại phòng</th>
                            <th class="d-none d-xl-table-cell">Ngày Check-In</th>
                            <th class="d-none d-xl-table-cell">Ngày Check-Out</th>
                            <th class="d-none d-xl-table-cell">Trạng thái</th>
                            <th class="d-none d-xl-table-cell">Chức Năng</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bookings as $key => $booking)
                            <tr>
                                <td class="d-none d-xl-table-cell">{{ $key+1 }}</td>
                                <td class="d-none d-xl-table-cell">{{ $booking->code ?? ''  }}</td>
                                <td class="d-none d-xl-table-cell">{{ $booking->user->full_name ?? ''  }}</td>
                                <td class="d-none d-xl-table-cell">{{ $booking->roomType->name ?? ''  }}</td>
                                <td class="d-none d-xl-table-cell">{{  $booking->check_in_date ?? ''  }}</td>
                                <td class="d-none d-xl-table-cell">{{  $booking->check_out_date ?? ''  }}</td>
                                <td class="d-none d-xl-table-cell">
                                    @switch( $booking->status)
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
                                <td class="d-none d-xl-table-cell">
                                    <a href="{{ route('booking.showUpdate', $booking->id) }}" class="btn btn-primary">
                                        <i class='bx bxs-edit'></i>
                                    </a>
                                    <a href="" class="btn btn-danger">
                                        <i class='bx bx-trash'></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
