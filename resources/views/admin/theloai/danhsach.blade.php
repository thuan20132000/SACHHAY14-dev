@extends('admin.layouts.masterpage')

@section('content')
        <div>
         <a href="{{route('admin/theloai/them')}}" class="btn btn-info">Them</a>
        </div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">The Loai</th>
      <th scope="col">Sua</th>
      <th scope="col">Xoa</th>
    </tr>
  </thead>
  <tbody>
      @foreach($theloais as $tl)
    <tr>
      <th scope="row">{{$tl->id}}</th>
      <td>{{$tl->tentheloai}}</td>
      <td><a href="sua/{{$tl->id}}" class="btn btn-success ">Sua</a></td>
      <td><a href="xoa/{{$tl->id}}" class="btn btn-danger">Xoa</a></td>
    </tr>
     @endforeach
  </tbody>
</table>
@endsection