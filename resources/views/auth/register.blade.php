@extends('layout')
@section('title', 'register')
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
i#togglepass {
    align-items: center;
    display: flex;
    margin-right: 10px;
}
i#toggleconf_pass {
    align-items: center;
    display: flex;
    margin-right: 10px;
}

</style>
<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="{{asset('img/1d86085f6526434db64314840bed6a96.png')}}"
                    style="    width: 131px;
                    border-radius: 25px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">We are The Kilani Team</h4>
                </div>

                <form id="regiseterform">
                    @csrf
                    <div class="p-3 mb-2 bg-success bg-gradient text-white rounded-5 message" style="display:none"></div>
                    <div class="p-3 mb-2 bg-danger bg-gradient text-white rounded-5 errormessage" style="display:none"> </div>

                  <p>Start Your experience</p>

                  <div class="form-outline mb-4">
                    <input type="text" id="f_name" class="form-control"
                      placeholder="First Name" />
                    <label class="form-label" for="form2Example11">First Name</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="text" id="l_name" class="form-control"
                      placeholder="Last name" />
                    <label class="form-label" for="form2Example11">Last Name</label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="email" id="email" class="form-control"
                      placeholder="email address" />
                    <label class="form-label" for="email">Email</label>
                  </div>
                  <div class="form-outline mb-4" style="display:flex">
                    <input type="password" id="pass" class="form-control" />
                    <i class="fas fa-eye" id="togglepass"></i>

                    <label class="form-label" for="form2Example22">Password</label>
                  </div>
                  <div class="form-outline mb-4"  style="display:flex">
                    <input type="password" id="conf_pass" class="form-control" />
                    <i class="fas fa-eye" id="toggleconf_pass"></i>
                    <label class="form-label" for="form2Example22">Confirm Password</label>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1 forloginbtn" >
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 headerbtn btninauth"  onclick="register()"type="button">Sign Up</button>
                    <a class="text-muted" href="{{route('forget.password')}}">Forgot password?</a>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p   class="mb-0 me-2">Do You have an account?</p>
                    <a  href="{{route('login')}}" class="btn btn-outline-danger headerbtn btninauth">Sign In</a>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2 shadow-1-strong" id="background-video">
                <video style="min-width: 100%; min-height: 100%;" playsinline autoplay muted loop>
                    <source class="h-100 forvedio"
                    src="{{ asset('vedio/shinobu-butterflies-wisteria-kimetsu-no-yaiba-moewalls-com.mp4') }}"
                      type="video/mp4"
                    />
        
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
     function displayErrorMessage(message) {
            var errorMessageElement = $(".errormessage");
            errorMessageElement.text(message);
            errorMessageElement.show();
            var sucssesMessageElement = $(".message");
            sucssesMessageElement.hide();


        }

 function register() {
   var fname = $("#f_name").val();
            var lname = $("#l_name").val();
            var email = $("#email").val();
            var password = $("#pass").val();
            var conf_pass = $("#conf_pass").val();
            var CSRFToken = $('meta[name="csrf-token"]').attr('content');

            if (fname.trim() === "" || lname.trim() === "") {
        displayErrorMessage("Please enter a valid name.");
    } else if (email.trim() === "") {
        displayErrorMessage("Please enter a valid email.");
    } else if (!email.includes("@gmail.com")) {
        displayErrorMessage("Email must be a valid Gmail address.");
    } else if (password === "") {
        displayErrorMessage("Please enter a valid password.");
    } else if (conf_pass === "" || conf_pass !== password) {
        displayErrorMessage("Please enter a valid confirmation password.");
    } 

    else {
        var name=fname+lname;

         var requestData={
            email,
            password,
            name,
            _token:CSRFToken
        };
        console.log(requestData);
        $.ajax({
            url:'/register',
            method: "POST",
            data:requestData,
            success: function(response) {
            console.log(response);
            $(".message").text(response.message);
            $(".message").show();
            $(".errormessage").hide();


        document.getElementById("regiseterform").reset();
            
              },
            error: function(xhr, status, error) {
        console.log("Error status: " + status);
        console.log("Error response text: " + xhr.responseText)
        ;
        var errorMessage = JSON.parse(xhr.responseText);
        console.log(errorMessage.errormessage);
        $(".errormessage").show();
        $(".errormessage").text(errorMessage.errormessage);
             }

        });

    }

}

var passwordInput = document.getElementById('pass');
var togglePassword = document.getElementById('togglepass');

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

var cPasswordInput = document.getElementById('conf_pass');
var toggleCPassword = document.getElementById('toggleconf_pass');

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