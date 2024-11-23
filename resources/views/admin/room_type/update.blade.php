@extends('admin.layouts.main')
@section('content')
   <div class="body-wrapper">
       <div class="container-fluid">
           <div class="table-container">
               <div class="row">
                   <div class="col-md-6">
                       <div class="table-heading">
                           <h3>Chỉnh Sửa <strong>Loại Phòng</strong></h3>
                       </div>
                   </div>
               </div>
               <div class="card">
                   <div class="card-body">
                       <form action="{{route('room_type.showSave', $room_type->id)}}" method="post">
                           @csrf
                           <div class="mb-3">
                               <label for="name" class="form-label">Tên Loại Phòng</label>
                               <input type="text" name="name" id="name" value="{{$room_type->name ?? '' }}" class="form-control">
                           </div>
                           <div class="mb-3">
                               <label for="description" class="form-label">Mô Tả</label>
                               <textarea name="description" id="description"  rows="6" class="form-control">{{$room_type->description ?? '' }}</textarea>
                           </div>
                           <div style="float: right">
                               <button type="submit" class="btn btn-primary">Tạo mới</button>
                               <a href="{{route('room_type.showIndex')}}" class="btn btn-danger">Hủy</a>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection
