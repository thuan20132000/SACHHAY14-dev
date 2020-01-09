@extends('admin.layouts.masterpage')

@section('content')
<h1>Them Sach</h1>
<div id="them-wrapper">

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <form action="{{route('admin/sach/postthem')}}" enctype="multipart/form-data" method="post">
    @csrf
            <div class="form-group">
            <select name="idtheloai" id="theloai">
              @foreach($theloais as $tl)
              <option value="{{$tl->id}}">{{$tl->tentheloai}}</option>
              @endforeach
            </select>
            </div>
            
            <div class="form-group">
                <label for="">ID Sach</label>
                <input type="text" name="id" class="form-control">
            </div>
            <div clas="form-group">
                <label for="">Ten Sach</label>
                <input type="text" name="tens" class="form-control">
            </div>
            <div clas="form-group">
                <label for="">Ten Khong Dau</label>
                <input type="text" name="tenkd" class="form-control">
            </div>
            <div clas="form-group">
                <label for="">Tác Giả</label>
                <input type="text" name="tacgia" class="form-control">
            </div>
            <div clas="form-group">
                <label for="">Hình Ảnh</label>
                <img src="hinhanh/{{}}" alt="">
                <input type="file" name="hinhanh" class="form-control">
            </div>
            <div clas="form-group">
                <label for="">Noi Bat</label>
                <input type="text" name="noibat" class="form-control">
            </div>     
            <div clas="form-group">
                <label for="">Mới Cập Nhật</label>
                <input type="text" name="moicapnhat" class="form-control">
            </div>
            <div clas="form-group">
                <label for="">Ghi Chú</label>
                <input type="text" name="chuthich" class="form-control">
            </div>       
            <br>
            <div class="form-group">

            <input type="submit" class="btn btn-info" value="them">

            </div>
        
    </form>

</div>
<hr>

@endsection