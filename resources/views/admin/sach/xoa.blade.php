@extends('admin.layouts.masterpage')

@section('content')
<h1>Xoa Sach</h1>
<div id="them-wrapper">
    
    <form action="{{route('admin/sach/postxoa',$s->id)}}" method="post">
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
            <div clas="form-group">
                <label for="">Noi Bat</label>
                <input type="text" name="noibat" class="form-control" value="{{$s->noibat}}">
            </div>            
            <br>
            <div class="form-group">

            <input type="submit" class="btn btn-info" value="xoa">

            </div>
    </form>

</div>
<hr> 
@endsection