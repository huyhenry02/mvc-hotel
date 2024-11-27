@extends('admin.layouts.main')
@section('content')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="table-container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="table-heading">
                            <h3>Thêm Mới <strong>Phòng</strong></h3>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('room.showStore') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="room_type_id" class="form-label">Loại Phòng</label>
                                <select name="room_type_id" id="room_type_id" class="form-select" required>
                                    <option value="" disabled selected>Chọn loại phòng</option>
                                    @foreach($roomtypes as $room_type)
                                        <option value="{{ $room_type->id }}">{{ $room_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="floor" class="form-label">Tầng</label>
                                <input type="number" name="floor" id="floor" placeholder="Tầng" class="form-control">
                            </div>
                            <div style="float: right">
                                <button type="submit" class="btn btn-primary">Tạo mới</button>
                                <a href="{{route('room.showIndex')}}" class="btn btn-danger">Hủy</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
