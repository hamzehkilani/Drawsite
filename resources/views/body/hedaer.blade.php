<header>
  
<style>
   .headerbtn{
    background: linear-gradient(to right, #8f0dfd, #8f0dfd 50%, #8f0dfd 50%, #7d0dfded);
    color: white;
    border: 0px !important;
}
.fa-bell {
    font-family: "Font Awesome 6 Free";
    font-weight: 900;
    font-size: 25px;
    color: white;
}
.fa-shopping-cart{
  font-family: "Font Awesome 6 Free";
    font-weight: 900;
    font-size: 25px;
    color: white;
}
.fa-facebook-messenger{
    font-weight: 900;
    font-size: 25px;
    color: white;
}

img.rounded-circle {
    margin-top: -18px;
    margin-bottom: -10px;
    margin-right: 15px;
}
.dropdown-menu[data-bs-popper] {
    top: 132%;
    left: -90px;
    margin-top: var(--bs-dropdown-spacer);
}
.me-auto {
    margin-right: auto!important;
    margin-left: auto !important;
}


.headerbtn:hover{
    background: linear-gradient(to right, #8f0dfd, #8f0dfd 50%, #8f0dfd 50%, #7d0dfded);
    color: white !important;
}
.mask{

    background: linear-gradient( 45deg, rgb(73 76 75 / 55%), rgba(91, 14, 214, 0.7) 100% ) !important;
}
.userdropdown{
  color:white;
}
.userdropdown:hover{
  color:white;
}
button.btn.dropdown-toggle.userdropdown {
  color:white;

}
a.btn.px-3.me-2.userdropdown {
    color: white;
}
.d-flex.align-items-center.website {
    margin-left: 23px;
    margin-right: 23px;
}
@media screen and (min-width: 200px) and (max-width: 1000px) {

.hideinmedai{
  display: none !important;
}
.dropdown-menu.show {
    display: block !important;
    z-index: 2000;
    background: linear-gradient( 45deg, rgb(73 76 75 / 55%), rgba(91, 14, 214, 0.7) 100% ) !important;
    color: white;
}
a.dropdown-item {
    color: white;
}
.productinfo{
  flex-direction: column;
}
  .website{
    display: none !important;

  }
  .dropdowninmedai{
    display:flex !important;
    align-items: center;
  }
  nav.navbar.navbar-expand-lg.d-lg-block {
    z-index: 2000;
    background: linear-gradient( 45deg, rgb(73 76 75 / 55%), rgba(91, 14, 214, 0.7) 100% ) !important;
    color: white;
}
button.btn.dropdown-toggle.userdropdowninmedai {
    color: white;
}
button.navbar-toggler.collapsed {
    color: white;
}
a.navbar-brand.nav-link.logoname {
    color: white !important;
}
button.navbar-toggler.dropdown-toggle.userdropdowninmedai {
    color: white;
    font-size: 18px;
}
form.d-flex.userdropdown {
    display: none !important;
}
.show{
  display:flex !important;
}
.me-auto {
    margin-right: auto!important;
    margin-left: 0px !important;
}
.d-center{
  align-items: center;
}

.fa-bell {
    font-family: "Font Awesome 6 Free";
    font-weight: 900;
    font-size: 22px;
    color: white;
}
.fa-shopping-cart{
  font-family: "Font Awesome 6 Free";
    font-weight: 900;
    font-size: 20px;
    color: white;
}
.fa-facebook-messenger{
    font-weight: 900;
    font-size: 20px;
    color: white;
}
.messangermedia{
  display: flex !important;
    justify-content: center;
    align-items: center;
}
img.profile-img {
    width: 149px !important;
    height: 142px !important;
    border-radius: 119px !important;
    margin: 10px !important;
}
.messagecount{
  margin-top: -13px;
    margin-right: -31px;
}
}


    </style>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg  d-lg-block" style="z-index: 2000;">
      <div class="container-fluid">
<div class="d-flex d-center">
  <a class="navbar-brand nav-link logoname" href="{{route('homepage')}}">
    <strong>Artistic life</strong>
  </a>
  @auth 
  <i class="fas fa-search fa-xs show" style="display:none"></i>
    <livewire:SearchComponent /> 
  @endauth
  </div> 
  @auth     
     <div class="d-flex">
      
     
      <a class="text-reset me-3 dropdown-toggle hidden-arrow messangermedia" style="display:none;" href="#" id="navbarDropdownMenuLink" role="button" aria-expanded="false">
        <i class="fa-brands fa-facebook-messenger"></i>
        <input  hidden type="text"id="userloginid" value="{{auth()->user()->id}}">
         <span class="badge rounded-pill badge-notification bg-danger messagecount">1</span>
      </a>

    <a class="text-reset me-3 messangermedia" style="display:none;" href="#">
      <i class="fas fa-shopping-cart"></i>
      <span class="badge rounded-pill badge-notification bg-danger">1</span>

    </a>
    
    
      <div class="dropdown messangermedia mt-1" style="display:none;">
        <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-bell"></i>
          <span class="badge rounded-pill badge-notification bg-danger">1</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-16px, 24.5px, 0px);" data-popper-placement="bottom-end" data-mdb-popper="null">
          <li>
            <a class="dropdown-item" href="#">Some news</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Another news</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Something else here</a>
          </li>
        </ul>
      </div>

      <div class="dropdown messangermedia mt-2" style="display:none;">
        <img src="{{asset('storage/'. (auth()->user()->userimg?auth()->user()->userimg:'userimg/defaultimg.jpg'))}}" class="rounded-circle" height="30" alt="Black and White Portrait of a Man" data-bs-toggle="dropdown" aria-expanded="false" loading="lazy"> </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Edit Profile</a></li>
          <li><a class="dropdown-item" href="/usersprofile/{{auth()->user()->id}}/0">Profile</a></li>
          <li><a class="dropdown-item" href="#">Your Events</a></li>
          <li><a class="dropdown-item" href="{{route('logout')}}" >Logout</a></li>
        </ul>
      </div>
      <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
      aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
     </div>
     @endauth
@guest
     <div class="d-flex">
      <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
      aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
     </div>
     @endguest
       
        <div class="collapse navbar-collapse" id="navbarExample01">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item active">
              <a class="nav-link"  href="{{route('homepage')}}">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link"  href="{{route('homepage')}}">Posts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('aboutus')}}" rel="nofollow"
                >About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('Shoppage')}}">Shop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('user.events')}}" >Events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('user.newrequest')}}">New Request</a>
            </li>
          </ul>
          @guest
          <div class="d-flex align-items-center hideinmedai">
            <a type="button" href="{{route('login')}}" class="btn btn-link px-3 me-2 headerbtn">
              Login
            </a>
            <a type="button" href= "{{route('register')}}" class="btn btn-primary me-3 headerbtn">
              Sign up for free
            </a>
          </div>
          @endguest
          @auth
          <div class="d-flex align-items-center website" >
            <livewire:messagecount /> 

            <livewire:cartcount /> 
            
            <div class="dropdown">
              <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-bell"></i>
                <span class="badge rounded-pill badge-notification bg-danger">1</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-16px, 24.5px, 0px);" data-popper-placement="bottom-end" data-mdb-popper="null">
                <li>
                  <a class="dropdown-item" href="#">Some news</a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">Another news</a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">Something else here</a>
                </li>
              </ul>
            </div>

             <div class="dropdown">
                <img src="{{asset('storage/'. (auth()->user()->userimg?auth()->user()->userimg:'userimg/defaultimg.jpg'))}}" class="rounded-circle" height="40" alt="Black and White Portrait of a Man" data-bs-toggle="dropdown" aria-expanded="false" loading="lazy"> </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/EditProfile/{{auth()->user()->id}}">Edit Profile</a></li>
                <li><a class="dropdown-item"  href="/usersprofile/{{auth()->user()->id}}/0" >Profile</a></li>
                <li><a class="dropdown-item" href="{{route('user.order')}}">Your Orders</a></li>
                <li><a class="dropdown-item" href="{{route('logout')}}" >Logout</a></li>
              </ul>
            </div>
          </div>
          @endauth
        </div>
      </div>
    </nav>
    <div id="intro" class="bg-image vh-100 shadow-1-strong">
      <video style="min-width: 100%; min-height: 100%;" playsinline autoplay muted loop>
        <source class="h-100 forvedio"
        src="{{ asset('vedio/shinobu-butterflies-wisteria-kimetsu-no-yaiba-moewalls-com.mp4') }}"
          type="video/mp4"
        />
      </video>
      <div class="mask" style="
            background: linear-gradient(
              45deg,
              rgba(29, 236, 197, 0.7),
              rgba(91, 14, 214, 0.7) 100%
            );
          ">
        <div class="container d-flex align-items-center justify-content-center text-center h-100">
          <div class="text-white">
            <h1 class="mb-3">Welcome To Our Site</h1>
            <h5 class="mb-4">Best & Sheepest Help Site </h5>
            @guest
            <a type="button" href= "{{route('register')}}" class="btn btn-outline-light btn-lg m-2 headerbtn" 
            >Start Your experience</a>
          <a type="button"href="{{route('login')}}"  class="btn btn-outline-light btn-lg m-2 headerbtn"  >Login</a>
            @endguest
            @auth
            <a class="btn btn-outline-light btn-lg m-2 headerbtn"  role="button"
            rel="nofollow" target="_blank">Start Your experience</a>
          <a  type="button" class="btn btn-outline-light btn-lg m-2 headerbtn"   
          >About Us</a>
            @endauth
          
          </div>
        </div>
      </div>
    </div>
  </header>

