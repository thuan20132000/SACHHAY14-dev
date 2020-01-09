<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{route('admin/trangchu')}}">ADMIN</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Thể Loại
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach($theloais as $tl)
            <a class="nav-link" href="{{route('admin/sach/danhsach',['id_theloai'=>$tl->id])}}">
              <span data-feather="file"></span>
              {{$tl->tentheloai}}
            </a>
            @endforeach
        </div>
      </li>

      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Lấy Sách
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
    
              <a class="nav-link" href="{{route('sachvui/getsach')}}">
                <span data-feather="file"></span>
                SachVui.com
              </a>
            
          </div>
        </li>
    </ul>
    <form class="form-inline my-2 my-lg-2" id="nav-form-admin">
      <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Admin
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          @if(Auth::guard('admin')->check())
          <a class="dropdown-item" href="{{route('admin/dangxuat')}}">Dang Xuat</a>
          @else
          <a class="dropdown-item" href="{{route('admin/dangnhap')}}">Dang Nhap</a>
          <a class="dropdown-item" href="{{route('admin/dangky')}}">Dang Ky</a>
          @endif

        </div>
      </div>
    </form>
  </div>
</nav>