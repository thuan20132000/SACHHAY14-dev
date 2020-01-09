<div  id="right-side-wrapper" class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin-top:30px">
            
            <div>
                    
            </div>
            <h5 class="list-items-header" >Sách Đọc Nhiều</h5>
            <div class="card" style="width: 100%">
                

                @foreach($sachDocNhieu as $sach)
                <div  class="sach-docnhieu">
                    <div class="sach-docnhieu-image">
                        <a href="{{route('home/sach',['id'=>$sach->id,'tensach'=>$sach->tenkhongdau])}}"><img  src="../../hinhanh/{{$sach->hinhanh}}" alt=""></a>
                    </div>
                    <div class="sach-docnhieu-text">
                        <p>Tên sách : {{$sach->tensach}}</p>
                        <p>Tác giả : {{$sach->tacgia}}</p>
                        <p>Lượt đọc : {{$sach->dadoc}}</p>
                    </div>
                </div>
                   
                @endforeach
               
            </div>

            <br>
          
            <br>
</div>