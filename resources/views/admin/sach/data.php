<table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Ten Sach</th>
              <th scope="col">Ten Khong Dau</th>
              <th scope="col">Noi Bat</th>
              <th scope="col">ID The loai</th>
            </tr>
          </thead>
          <tbody>
           
            <tr>
              <th scope="row">{{$sach->id}}</th>
              <th scope="row">{{$sach->tensach}} </th>
              <th scope="row">{{$sach->tenkhongdau}}</th>
              <th scope="row">ten</th>
              <th scope="row">ten </th>
              <th scope="row">sach</th>
              
              <td><a href="sua/{{$s->id}}" class="btn btn-success ">Sua</a></td>
              <td><a href="xoa/{{$s->id}}" class="btn btn-danger">Xoa</a></td>
            </tr>
            
          </tbody>
</table>