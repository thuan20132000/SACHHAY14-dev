@extends('admin.layouts.masterpage')

@section('content')
<h1>Them The Loai</h1>
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
    <form action="{{route('admin/theloai/postthem')}}" method="post">
    @csrf
        <div class="form-group">
            <label for="">ID The Loai</label>
            <input type="text" name="id" class="control">
            <label for="">Ten The Loai</label>
            <input type="text" name="tentheloai" class="control">
            <input type="submit" class="btn btn-info " value="them">
        </div>
    </form>

</div>
<hr>

@endsection