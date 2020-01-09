@extends('admin.layouts.masterpage')

@section('content')
<h1>Sua The Loai</h1>
<div id="them-wrapper">
    
    <form action="{{route('admin/theloai/postsua',$tl->id)}}" method="post">
    @csrf
        <div class="form-group">
            <label for="">ID The Loai</label>
            <input  readonly type="text" name="idtl" class="control" value="{{$tl->id}}">
            <label for="">Ten The Loai</label>
            <input  type="text" name="tentl" class="control" value="{{$tl->tentheloai}}">
            <input type="submit" class="btn btn-info" value="Sua">
        </div>
    </form>

</div>
<hr> 
@endsection