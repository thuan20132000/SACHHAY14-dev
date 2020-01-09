@extends('pages.layouts.masterpage')


@section('content')

<div id="user-dangky-wrapper">
    <br>
    <div class="fdangky-wrapper">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (Session::has('success'))
    <div class="alert alert-success">
        <ul>
                <li>{{ session('success')}}</li>
        </ul>
    </div>
    @endif

    

    
    <p class="dangky-text">Đăng Ký</p>   
    <form method="post" action="{{route('user/postdangky')}}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Họ Tên</label>
            <input name="hoten" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Tên Đăng Nhập</label>
            <input name="tendangnhap" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Mật Khẩu</label>
            <input name="matkhau" type="password" class="form-control" id="exampleInputPassword1" >
        </div>
        <div class="form-group">
            <input class="btn btn-success" type="submit" value="Đăng Ký">
        </div>
    </form>

    </div>

</div>
    

@endsection