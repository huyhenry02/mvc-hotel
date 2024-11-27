@php use App\Models\Transaction; @endphp
@extends('admin.layouts.main')
@section('content')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="table-container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="table-heading">
                            <h3>
                                Danh Sách <strong>Hóa Đơn</strong>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th class="d-none d-xl-table-cell">Stt</th>
                                <th class="d-none d-xl-table-cell">Mã Đơn</th>
                                <th class="d-none d-xl-table-cell">Phương Thức Thanh Toán</th>
                                <th class="d-none d-xl-table-cell">Ngày Thanh Toán</th>
                                <th class="d-none d-xl-table-cell">Trạng Thái</th>
                                <th class="d-none d-xl-table-cell">Số Lượng</th>
                                <th class="d-none d-xl-table-cell">Chức Năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transactions as $key => $transaction)
                                <tr class="text-center">
                                    <td class="d-none d-xl-table-cell">{{$key + 1}}</td>
                                    <td class="d-none d-xl-table-cell">{{$transaction->booking->id ?? ''}}</td>
                                    <td class="d-none d-xl-table-cell">{{$transaction->payment_method ?
                                                  Transaction::ARRAY_METHOD[$transaction->payment_method] : ''}}</td>
                                    <td class="d-none d-xl-table-cell">{{$transaction->payment_date ?? ''}}</td>
                                    <td class="d-none d-xl-table-cell">{{$transaction->transaction_status ?
                                                    Transaction::ARRAY_STATUS[$transaction->transaction_status] : ''}}</td>
                                    <td class="d-none d-xl-table-cell">{{$transaction->amount ?? ''}}</td>
                                    <td class="d-none d-xl-table-cell">
                                        <a href="{{route('transaction.showUpdate', $transaction->id)}}" class="btn btn-primary">
                                            <i class='bx bxs-edit'></i>
                                        </a>
                                        <a href="{{route('transaction.destroy', $transaction->id)}}" class="btn btn-danger"
                                           onclick="return confirm('Bạn muốn xóa không? Mã: {{ $transaction->id }}');">
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
    </div>
@endsection
