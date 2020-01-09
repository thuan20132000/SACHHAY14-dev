

<div id="header-wrapper">
    <div class="row" style="margin:0">
        <div id="head-logo" class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <img src="{{asset('logo-header.png')}}" width="220px" height="80px" >
            
        </div>
        <div id="head-text" class="col-xs-12 col-sm-8 col-md-8 col-lg-8" >
            <p>Good friends, good books, and a sleepy conscience: this is the ideal life. </p>
            <p>Bạn tốt, sách hay và một lương tâm thanh thản: đó chính là cuộc sống lý tưởng.</p>
            <div class="search-container">
                <form action="{{route('user/timkiem')}}" method="post">
                @csrf
                    <input type="text" placeholder="Nhập từ khoá tìm kiếm .." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
        <!-- style="background-color:#a49d80" -->

<nav id="navbar-wrapper" class="nav-wrapper navbar navbar-expand-lg ">
        

        <a class="navbar-brand" href="{{route('home')}}"><i  class="fas fa-home icon-navbar" style="margin:0 20px;font-size:28px;"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
        <i class="fas fa-bars" style="font-size:30px;color:white"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Thư Viện Sách
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach($theloais as $tl)
                <a class="dropdown-item" href="{{route('home/theloai',['id'=>$tl->id])}}">{{$tl->tentheloai}}</a>
                @endforeach
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Thư Viện Truyện Tranh
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach($theloais as $tl)
                <a class="dropdown-item" href="{{route('home/theloai',['id'=>$tl->id])}}">{{$tl->tentheloai}}</a>
                @endforeach
                </div>
            </li>
            
           

            </ul>
              
                <li id="tuSach" class="tusach-item" style="display:none;">
                    <a href="{{route('user/giasach')}}" style="text-decoration:none;color:white"><i class="fas fa-book icon-navbar tusach-icon" ></i>Kệ Sách Online</a>
                </li>

                <li id="nav-user-area" style="margin:0;">
                <div class="nav-item dropdown">
                    <div class="nav-link dropdown-toggle user" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-circle icon-navbar"></i>    
                        <a  href="#" id="NameUser" >
                            User 
                        </a>
                    </div>
                   
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @auth
                    <a class="dropdown-item" style="display:none" href="{{route('user/giasach')}}">Gia Sach</a>

                    <p id="userName" style="display:none;padding:0">{{auth()->User()->hoten}}</p>
                    <script>
                        $('document').ready(function(){

                           var $userName =  $('#userName').text();
                           var $getName = $('#NameUser').text($userName);

                           var $gs = $('#tuSach').css('display','block');

                        
                        });
                    </script>
                    <a class="dropdown-item" href="{{route('user/dangxuat')}}">Đăng Xuất</a>
                    @else
                    <a class="dropdown-item" href="{{route('user/dangnhap')}}">Đăng Nhập</a>
                    <a class="dropdown-item" href="{{route('user/dangky')}}">Đăng Ký</a>
                    @endauth
                    </div>
                </div>
                </li>
               
          
        
</nav>


