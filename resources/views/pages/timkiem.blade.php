

@extends('pages.layouts.masterpage')

@section('content')
<div class="container">
<h5 style="color:white">Tim kiem</h5>

    <div class="row" id="content-wrapper"> 
    
    <!-- Left Side -->
    <div class="col-md-8">
        <div id="list-items-wrapper">

        @foreach($sachtimkiem as $sach)
        <div class="book-items">
            <a href="{{route('home/sach',['id'=>$sach->id,'tensach'=>$sach->tenkhongdau])}}">
                <img height="150px" width="100%" class="book-image"  src="../hinhanh/{{$sach->hinhanh}}" alt="">   
            </a>
            <p class="book-name">{{$sach->tensach}}</p>
            <div class="giasach-them" >
                <a style="text-decoration:none;color:#115c7e"  href="{{route('user/themgiasach',['idSach'=>$sach->id])}}" ><i style="font-size:18px;margin-right:10px;color:#115c7e" class="fas fa-cart-plus"></i>thêm</a>
            </div>
        </div>
        
        @endforeach
        
        </div>
        <!-- end-row -->
        
    </div>

    <!-- Right Side -->
    @include('pages.rightSideContent')

    </div>
</div>
@endsection