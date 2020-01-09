<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title id="Title">Lay Sach SV</title>
    <style>
        table#tbl-info{
            margin:auto;
        }
        #tbl-info td,th{
            border:1px solid black;
            border-collapse:collapse;
        }
    </style>
</head>
<body>
    <div class="container" style="margin-top:100px;width:50%"> 
    <form method="post" action="">
        @csrf
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">The Loai</label>
                <div class="col-sm-10">
                <select name="theloai" id="">
                    <option selected value="1">Tâm Lý - Kỹ Năng Sống</option>
                    <option value="2">Kinh Tế - Quản Lý</option>
                    <option value="3">Khoa Học - kỹ Thuật</option>
                    <option value="4">Truyện Ngắn - Ngôn Tình</option>
                    <option value="5">Tiểu Thuyết Phương Tây</option>
                    <option value="6">Truyện Teen - Tuổi Học Trò</option>
                </select>
                   
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                <input type="text" readonly value="{{$ids}}"  name="id" class="form-control" required >
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">URL</label>
                <div class="col-sm-10">
                <input type="text" name="urlSach" class="form-control" required>
                </div>
            </div>
           
            <div class="form-group ">
                <div class="col-sm-10" style="margin-left:40%">
                <button type="submit" class="btn btn-primary" >Lay Sach</button>
                </div>
            </div>
        </form>

    </div>
   
    <div id="displayResult" class="container" style="width:50%;margin-top:50px"> 


        <table id="tbl-info">
            <tr>
                <th>The Loai</th>
                <td>{{$theloai}}</td>
            </tr>
            <tr>
                <th>ID Sach</th>
                <td>{{$ids-1}}</td>
            </tr>
            <tr>
                <th>Ten Sach</th>
                <td>{{$tensach}}</td>
            </tr>
            <tr>
                <th>Ten Sach Khong Dau</th>
                <td>{{$tenkhongdau}}</td>
            </tr>
            <tr>
                <th>Tac gia</th>
                <td>{{$tacgia}}</td>
            </tr>
            
            <tr>
                <th>Ten Khong Dau</th>
                <td>{{$tenkhongdau}}</td>
            </tr>
            <tr>
                <th>Hinh Anh</th>
                <td>
                <img width="100px" src="{{$hinhanh}}" alt=""><br>
                </td>
            </tr>
        </table>
        <!-- end table -->

        <!-- kiemtrachuong -->
        <div>
        @if (Session::has('failed'))
        <div class="alert alert-danger">
            <ul>
                    <li>{{ session('failed') }}</li>
            </ul>
        </div>
        @endif
        
        </div>
      
    
             
      
        
    </div>
   
</body>

<script>
</script>
</html>