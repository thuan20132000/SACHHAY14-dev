@extends('admin.layouts.masterpage')

@section('content')


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
        <div>
         <a href="{{route('admin/danhngon/them')}}" class="btn btn-info">Them</a>
        </div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Danh Ngon Tieng Anh</th>
      <th scope="col">Dich Tieng Anh</th>
      <th scope="col">Danh Ngon Tieng Viet</th>
      <th scope="col">Nổi bật</th>
      <th scope="col">Sua</th>
      <th scope="col">Xoa</th>
    </tr>
  </thead>
  <tbody>
      @foreach($danhngons as $dn)
    <tr>
      <th scope="row">{{$dn->id}}</th>
      <td>{{$dn->tienganh}}</td>
      <td>{{$dn->chuthich}}</td>
      <td>{{$dn->tiengviet}}</td>
      <td>{{$dn->noibat}}</td>
      <td><a href="sua/{{$dn->id}}" class="btn btn-success ">Sua</a></td>
      <td><a href="xoa/{{$dn->id}}" class="btn btn-danger">Xoa</a></td>
    </tr>
     @endforeach
  </tbody>
</table>
@endsection