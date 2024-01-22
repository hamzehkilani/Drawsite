<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog the-size-model" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeloginmodel()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <section class="h-100 gradient-form" style="background: linear-gradient(45deg, #3c1341a3,#47224c5c, transparent);">
                    <div class="container py-5 h-100">
                      <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-xl-10">
                          <div class="card rounded-3 text-black">
                            <div class="row g-0">
                              <div class="col-lg-12">
                                <div class="card-body p-md-5 mx-md-4">
                  
                                  <div class="text-center">
                                    <img src="{{asset('img/1d86085f6526434db64314840bed6a96.png')}}"
                                      style="    width: 131px;
                                      border-radius: 25px;" alt="logo">
                                    <h4 class="mt-1 mb-5 pb-1">We are The Kilani Team</h4>
                                  </div>
                  
                                  <form>
                                      @csrf
                                      <div class="p-3 mb-2 bg-danger bg-gradient text-white rounded-5 errormessage" style="display:none"> </div>
                  
                                    <p>Please login to your account</p>
                  
                                    <div class="form-outline mb-4">
                                      <input type="email" id="Email" class="form-control"
                                        placeholder="Phone number or email address" />
                                      <label class="form-label" for="form2Example11">Email</label>
                                    </div>
                  
                                    <div class="form-outline mb-4" style="display:flex">
                                      <input type="password" id="Password" class="form-control" />
                                      <label class="form-label" for="form2Example22">Password</label>
                                      <i class="fas fa-eye"  id="togglePassword" ></i>
                  
                                    </div>
                  
                                    <div class="text-center pt-1 mb-5 pb-1 forloginbtn" >
                                      <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 headerbtn btninauth" onclick="login()" type="button">Log
                                        in</button>
                                      <a class="text-muted" href="{{route('forget.password')}}">Forgot password?</a>
                                    </div>
                  
                                    <div class="d-flex align-items-center justify-content-center pb-4">
                                      <p   class="mb-0 me-2">Don't have an account?</p>
                                      <a href="{{route('register')}}" class="btn btn-outline-danger headerbtn btninauth">Create new</a>
                                    </div>
                  
                                  </form>
                   
                                </div>
                              </div>
                             
                         
                          
                        </div>
                      </div>
                    </div>
                  </section>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>


function login(){
    const referrerUrl = window.location.href;
                    var message ="";
                var Email= $("#Email").val();
                var CSRFToken = $('meta[name="csrf-token"]').attr('content');
                var Password= $("#Password").val();
                if(Email===""){

        message=" please Enter Valid Email";
        console.log(message);
        $(".errormessage").text(message);
                $(".errormessage").show();

        }
        else if(Password===""){

        message=" please Enter Valid password";
        console.log(message);
        $(".errormessage").text(message);
                $(".errormessage").show();
        }

        else{

            const requestData ={
                Email,
                Password,
            _token: CSRFToken,
            referrerUrl
            };
                console.log(requestData);

                $.ajax({
            url: '/login',
            method: 'POST', 
            data: requestData,
            success: function(response) {
                console.log(response);
               window.location.href = response.url;                    
            },
            error: function(xhr, status, error) {
                console.log(error);
                var errorMessage = JSON.parse(xhr.responseText);

                $(".errormessage").text(errorMessage.message);
                $(".errormessage").show();

            }
        });

        }
   }
   var passwordInput = document.getElementById('Password');
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
    </script>