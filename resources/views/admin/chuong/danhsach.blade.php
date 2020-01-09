@extends('admin.layouts.masterpage')

@section('content')
<h1>Them Chuong</h1>
        <div>
         <a href="{{route('admin/chuong/them',['id'=>$ids])}}" class="btn btn-info">Them</a>
        </div>
<table class="table">
  <thead>
    <tr>
      <!-- <th scope="col">ID Chuong</th> -->
      <th scope="col">ID Sach</th>
      
      <th scope="col">Chuong</th>
      <th scope="col">Ten Chuong</th>
      <th scope="col">Noi Dung</th>
    </tr>
  </thead>
  <tbody>
  @foreach($chuongs as $ch)
    <tr>
      <!-- <th scope="row">{{$ch->id}}</th> -->
      <th scope="row">{{$ch->id_sach}}</th>
      <th scope="row">{{$ch->chuong}}</th>
      <th scope="row">{{$ch->tenchuong}}</th>
      <th scope="row">
        <textarea name="" id="" cols="66" rows="5" style="overflow:auto">
          {{$ch->noidung}}
        </textarea>
      </th>      
      <td><a href="{{route('admin/chuong/sua',['id_sach'=>$ids,'chuong'=>$ch->chuong])}}" class="btn btn-success ">Sua</a></td>
      <td><a href="{{route('admin/chuong/xoa',['id_sach'=>$ids,'chuong'=>$ch->chuong])}}" class="btn btn-danger">Xoa</a></td>
    </tr>
  @endforeach
     
  </tbody>
</table>
@endsection