@extends('admin.layouts.main')
@section('content')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="table-container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="table-heading">
                            <h3>
                                Danh Sách <strong>Phòng</strong>
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
                                <th class="d-none d-xl-table-cell">Loại Phòng</th>
                                <th class="d-none d-xl-table-cell">Mô Tả</th>
                                <th class="d-none d-xl-table-cell">Chức Năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rooms as $key => $room)
                                <tr class="text-center">
                                    <td class="d-none d-xl-table-cell">{{$key + 1}}</td>
                                    <td class="d-none d-xl-table-cell">{{$room->roomType->name?? ''}}</td>
                                    <td class="d-none d-xl-table-cell">{{$room->description}}</td>
                                    <td class="d-none d-xl-table-cell">
                                        <a href="{{route('room.showUpdate', $room->id)}}" class="btn btn-primary">
                                            <i class='bx bxs-edit'></i>
                                        </a>
                                        <a href="{{route('room.destroy', $room->id)}}" class="btn btn-danger"
                                           onclick="return confirm('Bạn muốn xóa không? Mã: {{ $room->id }}');">
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
