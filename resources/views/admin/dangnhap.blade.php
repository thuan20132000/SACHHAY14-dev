@extends('admin.layouts.masterpage')

@section('content')
    

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
    <h3>Dang Nhap</h3>     
    <form action="{{route(('admin/postdangnhap'))}}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Ten Dang Nhap</label>
            <input name="tendangnhap" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Mat Khau</label>
            <input name="matkhau" type="password" class="form-control" id="exampleInputPassword1" >
        </div>
        
        <input class="btn btn-success" type="submit" value="Dang Nhap">
        </form>

    </div>

@endsection