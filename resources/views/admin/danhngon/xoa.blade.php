@extends('admin.layouts.masterpage')

@section('content')
<h1>XOA Danh Ngon</h1>
<div id="them-wrapper">
    
    
    <form action="{{route('admin/danhngon/postxoa')}}" method="post">
    @csrf
        <div class="form-group" style="display:none">
            <label for="">ID</label>
            <input   type="text" name="id" class="form-control" value="{{$danhngon->id}}" >
        </div>
        <label for="">ID: {{$danhngon->id}}</label>
        <div class="form-group">
            <label for="">Danh ngôn tiếng anh</label>
            <input  type="text" name="dn-ta" class="form-control" value="{{$danhngon->tienganh}}">
        </div>
        <div class="form-group">
            <label for="">Dịch sang tiếng việt</label>
            <input type="text" name="dn-dta" class="form-control" value="{{$danhngon->chuthich}}">
        </div>
        <div class="form-group">
            <label for="">Danh ngôn tiếng Việt</label>
            <input type="text" name="dn-tv" class="form-control" value="{{$danhngon->tiengviet}}">
        </div>
        <div class="form-group">
            <label for="">Nổi Bật</label>
            <input  type="text" name="dn-nb" class="form-control" value="{{$danhngon->noibat}}">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-danger" class="form-control" value="Xoá">
        </div>
    </form>

</div>
<hr> 
@endsection