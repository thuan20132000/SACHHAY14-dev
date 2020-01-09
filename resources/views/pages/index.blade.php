



@extends('pages.layouts.masterpage')
@section('content')
<div id='content-wrapper'>
       
        <div  id="slide">
           @foreach($sachNoiBat as $sach)
            <div class="book-link" >
                <a href="{{route('home/sach',['id'=>$sach->id,'tensach'=>$sach->tenkhongdau])}}"> <img class="slide-hinhanh" style="height:100%;width:100%" class="book-image" src="hinhanh/{{$sach->hinhanh}}" alt=""> </a>
            </div>
            @endforeach
        </div>
        <hr>
    <br>
       
    <div class="row" id="content-wrapper" style="margin:0"> 

     <!-- Left Side -->
    <div id="left-side-wrapper" class="col-md-8" style="margin-top:30px">
            <!-- <div class="list-items-header">
                Sách Mới Cập Nhật
            </div> -->

            <div id="list-items-wrapper">
                @foreach($sachyeuthich as $sach)
                <div class="book-items">
                        <a href="{{route('home/sach',['id'=>$sach->id,'tensach'=>$sach->tenkhongdau])}}"> 
                            <img height="150px" src="hinhanh/{{$sach->hinhanh}}" style="width:100%"> 
                        </a>
                        <p class="book-name">{{$sach->tensach}}</p>
                    <div class="giasach-them" >
                        <a style="text-decoration:none;color:#115c7e"  href="{{route('user/themgiasach',['idSach'=>$sach->id])}}" ><i style="font-size:18px;margin-right:10px;color:#115c7e" class="fas fa-cart-plus"></i>lấy sách</a>
                    </div>
                </div>
                
                @endforeach
            </div>
            
            <br>
            <br>
            <div class="list-items-header">
                Sách Truyện Mới Cập Nhật
            </div>

            <div id="list-items-wrapper-ngontinh">
                <div class="book-items-list">
                       
                        @foreach($sachMoiCapNhat as $sach)
                               <div id="wrapper-ngontinh-list">
                                   <div class="img-ngontinh">
                                     <a href="{{route('home/sach',['id'=>$sach->id,'tensach'=>$sach->tenkhongdau])}}">
                                     <img height="80px" width="60px" src="hinhanh/{{$sach->hinhanh}}" alt="">
                                     </a>
                                   </div>
                                   <div class="text-ngontinh" style="margin-left:14px">
                                     <a href=""></a>
                                        <p>{{$sach->tacgia}}</p>
                                        <p>Tác giả : {{$sach->tacgia}}</p>
                                         <p>Lượt đọc : {{$sach->dadoc}}</p>
                                   </div>
                               </div>
                          
                        @endforeach
                      
                </div>
                
            </div>
            <br>
            <div class="list-items-header">
                Yêu Cầu Sách và Thảo Luận
            </div>
            <div class="card" style="width:100%;text-align:center">
                <div  class="fb-comments" data-href="https://www.facebook.com/permalink.php?story_fbid=107715400587254&id=104583534233774&__xts__[0]=68.ARDJ5ItqfrS8kLJOvxhMWMiPCp_CWRABeP8kn_qS7xITqzF05xCnTpMVBSbZEpAW3q2K7hmMLZE9j7mLG4SvSVMR1lHFOlYqcVIavTNIOnAh4pACbONMaTfKOuICVGAxluYY3jlGebxwEawV_0_23OXveCfhIef66mbAsk8aTDYZGjY-MIzesGHwwxVGtm-R8sytcSAl6xQZ0dXiYakVd0BcuPPclb257N6j5ULrU5J-XdGnIaGF2pVjRh8cf3w_KSXh99OE1tMSUhA0zK6cNo-4YjjmLNRKsHxAU5AEsZtkW253OV4pHrAF-7BQCFuVFbnDeU2rfgWMBMEFcBE&__tn__=-R" data-width="420px" data-numposts="10"></div>
            </div>
            <div class="card" id="lienhe-fb" style="width:100%;text-align:center">
                    
                    <h5 class="list-items-header">LIÊN HỆ</h5>
                    <div class="fb-page" data-href="https://www.facebook.com/SachHay14-104583534233774/" data-tabs="timeline" data-width="280" data-height="260" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/SachHay14-104583534233774/">Facebook</a></blockquote></div>

            </div>
            

           
            
    </div>

        <!-- Right Side -->
        @include('pages.rightSideContent')
    </div>

    </div>
     <!-- end-row -->
           
</div>

<script src="js/content.js"></script>


@endsection

