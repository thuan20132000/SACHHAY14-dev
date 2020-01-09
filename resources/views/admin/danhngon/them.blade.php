@extends('admin.layouts.masterpage')

@section('content')
<h1>Them The Loai</h1>
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
    <form action="{{route('admin/danhngon/postthem')}}" method="post">
    @csrf
        <div class="form-group">
            <label for="">ID</label>
            <input type="text" name="id" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Danh ngôn tiếng anh</label>
            <input type="text" name="dn-ta" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Dịch sang tiếng việt</label>
            <input type="text" name="dn-dta" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Danh ngôn tiếng Việt</label>
            <input type="text" name="dn-tv" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Nổi Bật</label>
            <input type="text" name="dn-nb" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success" name="tentl" class="form-control">
        </div>
    </form>

</div>
<hr>

@endsection