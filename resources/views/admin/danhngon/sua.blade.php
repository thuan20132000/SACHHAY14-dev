@extends('admin.layouts.masterpage')

@section('content')
<h1>Sua The Loai</h1>
<div id="them-wrapper">
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session()->has('success'))
        <div class="alert alert-success">
                {{session()->get('success')}}
        </div>
    @endif
    <form action="{{route('admin/danhngon/postsua')}}" method="post">
    @csrf
        <div class="form-group" style="display:none">
            <label for="">ID</label>
            <input type="text" name="id" class="form-control" value="{{$danhngon->id}}" >
        </div>
        <label for="">ID: {{$danhngon->id}}</label>
        <div class="form-group">
            <label for="">Danh ngôn tiếng anh</label>
            <input type="text" name="dn-ta" class="form-control" value="{{$danhngon->tienganh}}">
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
            <input type="text" name="dn-nb" class="form-control" value="{{$danhngon->noibat}}">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success" name="tentl" class="form-control" value="Sửa">
        </div>
    </form>

</div>
<hr> 
@endsection