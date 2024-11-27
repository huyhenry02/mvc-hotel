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
                        <form action="" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name_booking" class="form-label">Tên người đặt</label>
                                <input type="text" name="name_booking" id="name_booking" placeholder="Tên người đặt" class="form-control">
                            </div>
                            <div style="float: right">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <a href="{{route('booking.showIndex')}}" class="btn btn-danger">Hủy</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
