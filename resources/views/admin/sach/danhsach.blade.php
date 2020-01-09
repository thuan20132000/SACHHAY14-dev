@extends('admin.layouts.masterpage')

@section('content')
<h1>Sach</h1>

        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        @if($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach($errors as $er)
                <li>{{$er}}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <div>
          <!-- <select name="" id="theloai">
              <option value="">The Loai</option>
              @foreach($theloais as $tl)
              <option value="{{$tl->id}}">{{$tl->tentheloai}}</option>
              @endforeach
          </select> -->
         <a href="{{route('admin/sach/them')}}" class="btn btn-info">Them</a>
        </div>
        <div id="table-wrapper">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Ten Sach</th>
              <th scope="col">Ten Khong Dau</th>
              <th scope="col">Noi Bat</th>
              
              <th scope="col">Moi Cap Nhật</th>
              <th scope="col">Đọc Nhiều</th>
              <th scope="col">Ghi Chu</th>
              <th scope="col">Chi Tiet</th>
           

              
              <th>Sua</th>
              <th>Xoa</th>
            </tr>
          </thead>
          <tbody id="table-row">
          @foreach($sachTL as $sach)
          <tr>
               <td scope="row">{{$sach->id}}</td>
               <td scope="row">{{$sach->tensach}}</td>
               <td scope="row">{{$sach->tenkhongdau}}</td>
               <td scope="row">{{$sach->noibat}}</td>
               <td scope="row">{{$sach->moicapnhat}}</td>
               <td scope="row">{{$sach->docnhieu}}</td>
               <td scope="row">{{$sach->ghichu}}</td>
              <td><a href="../../admin/chuong/danhsach/{{$sach->id}}">Xem Chương</a></td>
              <td><a href="sua/{{$sach->id}}" class="btn btn-success">Sua</a></td>
              <td><a href="xoa/{{$sach->id}}" class="btn btn-danger">Xoa</a></td>
          </tr>
          @endforeach
          
             
          </tbody>
        </table>
        {{ csrf_field() }}
        </div>
       
<!-- <script>
  $(document).ready(function(){
    $.ajaxSetup({

headers: {

    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

}

});
    $('#theloai').change(function(){
      var $id = $('#theloai').val();
      var _token = $('input[name="_token"]').val();
        $.ajax({
          url:"{{route('admin/sach/postdata')}}",
          method:"POST",
          data:{
            id:$id,
            _token:_token
          },
          success:function(data){
            $('#table-row').html(data);
        }});

    });
    
});
</script> -->
@endsection

