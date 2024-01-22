<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{route('admin.dashborad')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
              
             
            
                <a class="nav-link" href="{{route('admin.users')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-solid fa-user"></i></div>
                    Users
                </a>
                <a class="nav-link" href="{{route('admin.Painters')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-solid fa-palette"></i></div>
                    Painters
                </a>
                <a class="nav-link" href="{{route('admin.events')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-solid fa-calendar-days"></i></div>
                    Events
                </a>
                <a class="nav-link" href="{{route('admin.products')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-brands fa-product-hunt"></i></div>
                    Products
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
           {{auth()->user()->name}}({{auth()->user()->role}})
        </div>
    </nav>
</div>