<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Include CSS libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <!-- Additional CSS files -->
    <!-- Font Awesome 6 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet">

    @livewireStyles
    @yield('styles')
</head>

<style>
    /* Height for devices larger than 576px */
    @media (min-width: 992px) {
      #intro {
        margin-top: -58.59px;
        height: 50vh !important;
      }
    }
    span.badge.sale-badge.ms-2 {
    background-color: red;
}
s{
    color: #c60000;
}

    .fa-eye:before {
        content: "\f06e";
        color: #a007d9;
    }

    .fa-eye-slash:before {
        content: "\f070";
        color: #a007d9;
    }

    .navbar .nav-link {
        color: #fff !important;
    }

    .userforpostinfo {
        justify-content: space-between;
        align-items: center;
    }

    .forhearticon {
        margin-left: 5px;
    }

    .ausersprofile {
        color: black !important;
    }

    button.carousel-control-next,
    button.carousel-control-prev {
        display: block;
        height: 20px;
        margin: auto;
    }
</style>

<body>
    @include('body.hedaer')
    <!-- Your content goes here -->
    @yield('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
    
    @livewireScripts
    
    @yield('scripts')
    <script>
        function closeloginmodel(){
    console.log("u are here");
        $('#loginModal').modal('hide');
    }
   function showloginmode(){
    $.ajax({
            url:"/login-model",
            method:'GET',
            dataType: 'html', 
            success: function(data) {
        console.log(data);
        $('body').append(data);
        $('#loginModal').modal('show');    
              },
      error: function(xhr, status, error) {
        console.error(error);
      }
        })
   }

        </script>
    
</body>
</html>
