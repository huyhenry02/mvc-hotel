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
                                    <option value="" disabled selected>Select a Room Type</option>
                                    @foreach($roomtypes as $room_type)
                                        <option value="{{ $room_type->id }}">{{ $room_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Mô Tả</label>
                                <textarea name="description" id="description" class="form-control" rows="6" required></textarea>
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
