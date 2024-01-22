@extends('layout')
@section('title', 'Newpassword')
@section('content')
<style>
    #background-video {
    position: relative;
}

#background-video video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover; /* This ensures the video covers the entire div */
    overflow: hidden;
    background-attachment: fixed;

}
.forloginbtn{
    display: flex;
    flex-direction: column;
    align-items: center;
}
.btninauth{
width: fit-content; border-radius: 21px
}
i.fas.fa-eye {
    align-items: center;
    display: flex;
    margin-right: 10px;
}
i#togglePassword {
    align-items: center;
    display: flex;
    margin-right: 10px;
}
i#toggleCPassword {
    align-items: center;
    display: flex;
    margin-right: 10px;
}

</style>
<section class="h-100 gradient-form" style="background: linear-gradient(45deg, #3c1341a3,#47224c5c, transparent);">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="{{asset('img/logo.png')}}"
                    style="    width: 131px;
                    border-radius: 25px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">We are The Kilani Team</h4>
                </div>

                <form>
                    @csrf
                    <div class="p-3 mb-2 bg-danger bg-gradient text-white rounded-5 errormessage" style="display:none"> </div>
                  <p>Please login to your account</p>
                  <input type="text" id="userid" class="form-control" value="{{$user->id}}" hidden/>
                  <div class="form-outline mb-4" style="display:flex"> 
                    <input type="password" id="password" class="form-control"
                      placeholder="Password" />
                      <i class="fas fa-eye"  id="togglePassword" ></i>
                    <label class="form-label" for="form2Example11">Password</label>
                  </div>
                  <div class="form-outline mb-4" style="display:flex">
                    <input type="password" id="Cpassword" class="form-control" />
                    <label class="form-label" for="form2Example22">Confiram Password</label>
                    <i class="fas fa-eye" id="toggleCPassword"></i>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1 forloginbtn" >
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 headerbtn btninauth" onclick="chandepassword()" type="button">Change</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2 shadow-1-strong" id="background-video">
                {{-- <video style="min-width: 100%; min-height: 100%;" playsinline autoplay muted loop>
                    <source class="h-100 forvedio"
                    src="{{ asset('vedio/shinobu-butterflies-wisteria-kimetsu-no-yaiba-moewalls-com.mp4') }}"
                      type="video/mp4"
                    /> --}}
                    <img src="{{asset('img/login-bg.jpg')}}"
                    class="h-100 forvedio"
                    style="min-width: 100%; min-height: 100%;" alt="logo">
        
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  @endsection
@section('scripts')
<script>

function chandepassword() {
    var message = "";
    var password = $("#password").val();
    var id = $("#userid").val();
    var CSRFToken = $('meta[name="csrf-token"]').attr('content');
    var cpassword = $("#Cpassword").val();

    if (password === "") {
        message = "Please enter a valid password";
        console.log(message);
        $(".errormessage").text(message);
        $(".errormessage").show();
    } else if (cpassword === "") {
        message = "Please enter a valid confirm password";
        console.log(message);
        $(".errormessage").text(message);
        $(".errormessage").show();
    } else if (password !== cpassword) {
        message = "Please enter the same password";
        console.log(message);
        $(".errormessage").text(message);
        $(".errormessage").show();
    } else {
        const requestData = {
            cpassword,
            password, // Corrected variable name
            _token: CSRFToken
        };
        console.log(requestData);

        $.ajax({
            url: '/resetpasswordconf/' + id,
            method: 'put',
            data: requestData,
            success: function (response) {
                console.log(response);
                window.location.href = "{{ route('login') }}"; 
            },
            error: function (xhr, status, error) {
                console.log(error);
                var errorMessage = JSON.parse(xhr.responseText);

                $(".errormessage").text(errorMessage.message);
                $(".errormessage").show();
            }
        });
    }
}
var passwordInput = document.getElementById('password');
var togglePassword = document.getElementById('togglePassword');

togglePassword.addEventListener('click', function () {
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        togglePassword.classList.remove('fa-eye');
        togglePassword.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        togglePassword.classList.remove('fa-eye-slash');
        togglePassword.classList.add('fa-eye');
    }
});

var cPasswordInput = document.getElementById('Cpassword');
var toggleCPassword = document.getElementById('toggleCPassword');

toggleCPassword.addEventListener('click', function () {
    if (cPasswordInput.type === 'password') {
        cPasswordInput.type = 'text';
        toggleCPassword.classList.remove('fa-eye');
        toggleCPassword.classList.add('fa-eye-slash');
    } else {
        cPasswordInput.type = 'password';
        toggleCPassword.classList.remove('fa-eye-slash');
        toggleCPassword.classList.add('fa-eye');
    }
});
    </script>


    
@endsection