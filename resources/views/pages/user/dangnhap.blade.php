


@extends('pages.layouts.masterpage')


@section('content')
    
<div id="user-dangnhap-wrapper">
    <br>
    <div class="fdangnhap-wrapper">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (Session::has('failed'))
    <div class="alert alert-danger">
        <ul>
                <li>{{ Session('failed') }}</li>
        </ul>
    </div>
    @endif
    
        <p class="dangnhap-text">Đăng Nhập</p>     
        <form action="{{route(('user/postdangnhap'))}}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Tên Đăng Nhập</label>
                <input name="tendangnhap" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mật Khẩu</label>
                <input name="matkhau" type="password" class="form-control" id="exampleInputPassword1" >
            </div>
           
            <div class="form-group">
                <input class="btn btn-light" type="submit" value="Đăng Nhập">
              
            </div>
           
        </form>
            <div class="form-group">
            <small> Mời bạn đăng ký nếu chưa có tài khoản <a href="{{route('user/dangky')}}">Đăng Ký</a> </small>             
            </div>

    
    
    </div>

</div>
    

@endsection