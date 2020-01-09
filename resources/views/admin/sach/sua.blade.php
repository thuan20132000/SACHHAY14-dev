@extends('admin.layouts.masterpage')

@section('content')
<h1>Sua Sach</h1>
<div id="them-wrapper">
    
<form action="{{route('admin/sach/postsua',$s->id)}}" method="post">
    @csrf
        
            <div class="form-group">
                <label for="">ID Sach</label>
                <input readonly type="text" name="ids" class="form-control" value="{{$s->id}}">
            </div>
            <div clas="form-group">
                <label for="">Ten Sach</label>
                <input type="text" name="tens" class="form-control" value="{{$s->tensach}}">
            </div>
            <div clas="form-group">
                <label for="">Ten Khong Dau</label>
                <input type="text" name="tenkd" class="form-control" value="{{$s->tenkhongdau}}">
            </div>
            <div clas="form-group">
                <label for="">ID The Loai</label>
                <input readonly type="text" name="idtl" class="form-control" value="{{$s->id_theloai}}">
            </div>
            <hr>
            <div class="alert alert-info" role="alert">
                
            </div>
            <div class="form-group" >
            <label for="">Nổi Bật </label>
                <input type="text" name="noibat" class="form-control" value="{{$s->noibat}}">
            </div>
            <div clas="form-group">
                <label for="">Mới Cập Nhật</label>
                <input type="text" name="moicapnhat" class="form-control" value="{{$s->moicapnhat}}">
            </div>
            <div clas="form-group">
                <label for="">Đọc Nhiều </label>
                <input type="text" name="docnhieu" class="form-control" value="{{$s->docnhieu}}">
            </div>
            <div clas="form-group">
                <label for="">Chú Thích</label>
                <br>
                <textarea name="chuthich" id="" cols="50" rows="10">
                    {{$s->chuthich}}
                </textarea>
            </div>            
            <br>
            <div class="form-group">

            <input type="submit" class="btn btn-info" value="sua">

            </div>
        
    </form>

</div>
<hr> 
@endsection