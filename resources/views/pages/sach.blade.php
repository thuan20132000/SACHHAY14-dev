

@extends('pages.layouts.masterpage')

@section('content')
<div class="row" id="content-wrapper"> 
    
    <!-- Left Side -->
   <div class="col-md-8" id="sach-detail-wrapper" >
            <div class="sach-image-detail-wrapper">
                <div class="sach-image" >
                    <img src="../../hinhanh/{{$sach->hinhanh}}" alt="">
                </div>
                <div class="sach-detail">
                    <table>
                        <tr >
                            <td>Tên sách: {{$sach->tensach}}</td>
                        </tr>
                        <tr>
                            <td>Tác giả:  {{$sach->tacgia}}</td>
                        </tr>
                        <tr>
                            <td>Thể loại: {{$sach->theloai->tentheloai}} </td>
                        </tr>
                        <tr>
                            <td>Đã đọc:{{$sach->dadoc}} </td>
                        </tr>
                        <tr>
                            <td>Yêu Thích :
                                @for($i=0;$i<=4;$i++)
                                    <i style="color:#f1c482" class="fas fa-star"></i>
                                @endfor
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <div class="fb-like" data-href="https://www.facebook.com/SachHay14-104583534233774/{{$sach->id}}" data-width="" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>

                            </td>
                        </tr>
                    </table>            
                    <button class="btn"><a href="{{route('home/docsach',['id_sach'=>$sach->id,'tensach'=>$sach->tenkhongdau,'chuong'=>1])}}">Đọc Sách</a> </button>
                </div>
            </div>
            <br>           
            <div class="chuong-list">
                <h5>Danh Sách Chương</h5>
                <hr>
                <ul>
                    @foreach($chuongs as $ch)
                    <li><a style="font-size:14px;" href="{{route('home/docsach',['id_sach'=>$sach->id,'tensach'=>$sach->tenkhongdau,'chuong'=>$ch->chuong])}}">{{$ch->tenchuong}}</a></li>
                    <hr>
                    @endforeach
                </ul>

                <div style="float:right">
                {{$chuongs->links()}}
                </div>
                
            </div>

<!-- plugin facebook -->
            <br>
            <div >
                <div  class="fb-comments" data-href="https://www.facebook.com/SachHay14-104583534233774/{{$sach->id}}" data-width="420px" data-numposts="10"></div>
            </div>
            
          

    </div>
    

       <!-- Right Side -->
       @include('pages.rightSideContent')
   </div>
    <!-- end-row -->

    
    
    

@endsection