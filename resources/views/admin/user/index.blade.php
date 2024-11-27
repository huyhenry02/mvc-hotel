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
                                Danh Sách <strong>Người Dùng</strong>
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
                            <th class="d-none d-xl-table-cell">ID</th>
                            <th class="d-none d-xl-table-cell">Tên</th>
                            <th class="d-none d-xl-table-cell">Địa Chỉ</th>
                            <th class="d-none d-xl-table-cell">Số Điện Thoại</th>
                            <th class="d-none d-xl-table-cell">Vai Trò</th>
                            <th class="d-none d-xl-table-cell">Email</th>
                            <th class="d-none d-xl-table-cell">Chức Năng</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="d-none d-xl-table-cell">{{$user->id}}</td>
                                <td class="d-none d-xl-table-cell">{{$user->full_name}}</td>
                                <td class="d-none d-xl-table-cell">{{$user->address}}</td>
                                <td class="d-none d-xl-table-cell">{{$user->phone}}</td>
                                <td class="d-none d-xl-table-cell">{{$user->role_type ? User::ARRAY_ROLE[$user->role_type] : ''}}</td>
                                <td class="d-none d-xl-table-cell">{{$user->email}}</td>
                                <td class="d-none d-xl-table-cell">
                                    <a href="" class="btn btn-primary">
                                        <i class='bx bxs-edit'></i>
                                    </a>
                                    <a href="" class="btn btn-danger"
                                       onclick="return confirm('Bạn muốn xóa không? Mã: {{ $user->id }}');">
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
