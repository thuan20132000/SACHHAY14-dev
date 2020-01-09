@extends('admin.layouts.masterpage')

@section('content')
<h1>Sua Chuong</h1>
<div id="them-wrapper">
    @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
            @endif
    <form action="{{route('admin/chuong/postsua')}}" method="post">
    @csrf
        
            <!-- <div class="form-group">
                <label for="">ID Chuong</label>
                <input value="" type="text" name="idc" class="form-control">
            </div> -->
            <div clas="form-group">
                <label for="">ID Sach</label>
                <input value="{{$idSach}}" readonly type="text" name="idSach" class="form-control">
            </div>
            <div clas="form-group">
                <label for="">Chuong</label>
                <input value="{{$chuong->chuong}}" readonly type="text" name="chuong" class="form-control">
            </div>
            <div clas="form-group">
                <label for="">Ten Chuong</label>
                <input value="{{$chuong->tenchuong}}" type="text" name="tenchuong" class="form-control">
            </div>
            <div clas="form-group">
                <label for="">Noi Dung</label>
                <textarea name="noidung" id="editor1" cols="30" rows="10">
                   {!!$chuong->noidung!!}
                </textarea>
            </div>
            <script>
            </script>            
            <br>
            <div class="form-group">

            <input type="submit" class="btn btn-info" value="Sửa">

            </div>
        
    </form>

</div>
<hr>
<script>
ClassicEditor
    .create( document.querySelector( '#editor1' ), {
        toolbar: [ 'heading', '|', 'bold','italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' }
                    ]
        }
    
        
    } )
    .catch( error => {
        console.error( error );
    } );
</script>
@endsection