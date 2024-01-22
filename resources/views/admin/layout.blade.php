<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title> @yield('tilte') </title>
        <script src="https://cdn.tailwindcss.com"></script>

        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        @livewireStyles

    </head>
<style>
  .modal-backdrop.fade.show {
    display: none;
}
.alert.alert-success {
    background: #399d3999;
    width: fit-content;
    margin: auto;
    color: white;
}
  button.btn.createbtn {
    background: linear-gradient(45deg, #0010c6e0, #e66565);
    color: white;
}
button.btn-close {
    background: black;
    text-align: center;
    color: white;
}
button.btn-close:hover {
    background: rgb(255, 255, 255);
    text-align: center;
    color: rgb(0, 0, 0);
}
</style>
    <body class="sb-nav-fixed">
       @include('admin.body.header')

    <div id="layoutSidenav">
          
          <div id="layoutSidenav_content">
            {{-- @auth
            @if (auth()->user()->role_id == 1)
            @include('body.sidebar')

            @endif
 
            @endauth --}}
            @include('admin.body.sidebar')

            
            @yield('conetnt')
            @include('admin.body.footer')

          </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
      
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        @livewireScripts

       </body>
</html>