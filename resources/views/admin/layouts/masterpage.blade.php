
@include('admin.layouts.header')
  <body>
@include('admin.layouts.navbar')

<div class="container-fluid">
  
    <div style="margin:auto">
        @yield('content')
   
    </div>
</div>

@include('admin.layouts.footer')