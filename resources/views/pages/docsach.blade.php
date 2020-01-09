@extends('pages.layouts.masterpage')

<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-chevron-circle-up"></i></button>
<div id="content" >

@section('content')


    
    <!-- pagination -->
    <div class="pagination-wrapper" style="">
        <ul class="pagination" style="">
        <li  class="page-item truoc"><a class="page-link" href="{{route('home/docsach',['id'=>$sach->id,'sach_name'=>$sach->tenkhongdau,Request::segment(4)-1])}}"><i class="fas fa-reply page-icon"></i></a></li>
        
        <div class="dropdown" style="">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
           Chương
        </button>
        <div class="dropdown-menu" style="">
            @foreach($danhsachChuong as $ch)
            <li class="active">
                <a class="dropdown-item"  href="{{route('home/docsach',['id'=>$sach->id,'sach_name'=>$sach->tenkhongdau,'chuong'=>$ch->chuong])}}">{{$ch->tenchuong}}</a>
            </li>
           
            @endforeach
        </div>
        </div>
                    
        <li class="page-item sau">
            <a class="page-link" href="{{route('home/docsach',['id'=>$sach->id,'sach_name'=>$sach->tenkhongdau,Request::segment(4)+1])}}"><i class="fas fa-share page-icon"></i></a>
        </li>
         </ul>
    </div> 
    <!-- end top pagination -->


    <!-- NOIDUNG 1 CHUONG -->
    <div id="noidung-content">
    @foreach($chuongs as $ch)
        <div class="tensach-title">
            <small>{{$sach->tensach}}</small>
        </div>
        <div class="chuong-title">
        <p>{{$ch->tenchuong}}</p>
        </div>
       <div class="noidung-main">{!!$ch->noidung!!}</div>
       <div class="sochuong-bottom">
            <small class="sochuong">{{$ch->chuong}}</small>
        </div>
   @endforeach
    </div>
    <!-- END NOIDUNG  -->

    <div class="pagination-wrapper" style="display:flex;justify-content:center">
        <ul class="pagination" style="margin:auto">
        <li  class="page-item truoc"><a class="page-link" href="{{route('home/docsach',['id'=>$sach->id,'sach_name'=>$sach->tenkhongdau,Request::segment(4)-1])}}"><i class="fas fa-reply page-icon"></i></a></li>
        
        <div class="dropdown" style="position:relative">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
           Chuong
        </button>
        <div class="dropdown-menu" style="height:500px;width:400px;overflow:auto;position:absolute">
            @foreach($danhsachChuong as $ch)
            <li class="active">
            <a class="dropdown-item"  href="{{route('home/docsach',['id'=>$sach->id,'sach_name'=>$sach->tenkhongdau,'chuong'=>$ch->chuong])}}">{{$ch->tenchuong}}</a>
            </li>
           
            @endforeach
           
        </div>
        </div>
                    
        <li class="page-item sau"><a class="page-link" href="{{route('home/docsach',['id'=>$sach->id,'sach_name'=>$sach->tenkhongdau,Request::segment(4)+1])}}"><i class="fas fa-share page-icon"></i></a></li>
         </ul>
    </div> 
    <p id="tongsochuong" style="display:none">{{$tongsochuong}}</p>
    
    <!-- binh luan -->
    <div class="container" id="comment-wrapper">
        <div class="card">
            <div class="card-header">
                     Bình Luận
            </div>
            <div class="card-body">
        </div>

    </div>
    <!-- plugin facebook -->
   
    <div style="margin:auto">
        <div  class="fb-comments" data-href="https://www.facebook.com/SachHay14-104583534233774/{{$sach->id}}" data-width="560px" data-numposts="10"></div>
    </div>
    
  

</div>
<script>
    $('document').ready(function(){
        var $currentChuong = $('.sochuong').html();
        var $lastChuong  = $('#tongsochuong').html();
        
        if($currentChuong==1){
            $('.page-item.truoc').toggleClass('disabled');
        }
        if($currentChuong == $lastChuong){
            $('.page-item.sau').toggleClass('disabled');
        }

    });
    
</script>

<script>
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

</script>

@endsection