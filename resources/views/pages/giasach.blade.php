

@extends('pages.layouts.masterpage')

@section('content')
<div class="container">
    <div class="row" id="content-wrapper"> 
    
    <!-- Left Side -->
    <div class="col-md-8">
        <div id="giasach-items-wrapper">

       
        <div id="giasach-list" >

            @foreach($giasach as $gs)
                <div class="giasach-list-items">
                <a href="{{route('home/sach',['id'=>$sachs[$gs->id_sach],'tensach'=>$sachs[$gs->id_sach]->tenkhongdau])}}"><img width="100px" height="120px"  src="../../hinhanh/{{$sachs[$gs->id_sach]->hinhanh}}" alt=""></a>
                <a id="btn-xoasach" href="{{route('user/xoagiasach',['id_gs'=>$gs->id])}}" class="btn btn-danger">Trả Sách</a>
                <div>

                </div>
                </div>  
            
            @endforeach
            <script>
                
                
            </script>
            
        </div>

        </div>
        <!-- end-row -->
        
    </div>

    <!-- Right Side -->
    @include('pages.rightSideContent')

    </div>
</div>
@endsection