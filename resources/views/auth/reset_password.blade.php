@extends('layout')
@section('title', 'reset-password')
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

</style>
<section class="h-100 gradient-form" style="background: linear-gradient(45deg, #3c1341a3,#47224c5c, transparent);">
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
                    <div class="p-3 mb-2 bg-success bg-gradient text-white rounded-5 message" style="display:none"></div>

                  <p>Please Enter your email</p>

                  <div class="form-outline mb-4">
                    <input type="email" id="Email" class="form-control"
                      placeholder="Phone number or email address" />
                    <label class="form-label" for="form2Example11">Email</label>
                  </div>
                  <div class="text-center pt-1 mb-5 pb-1 forloginbtn" >
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 headerbtn btninauth" type="button" onclick="changepassword()">Reset</button>
                    <a class="text-muted" href="{{route('login')}}">Have Account ?</a>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p   class="mb-0 me-2">Don't have an account?</p>
                    <a href="{{route('register')}}" class="btn btn-outline-danger headerbtn btninauth">Create new</a>
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
 function changepassword(){
                var message ="";
                var Email= $("#Email").val();
                var CSRFToken = $('meta[name="csrf-token"]').attr('content');
                if(Email===""){

        message=" please Enter Valid Email";
        console.log(message);
        $(".errormessage").text(message);
                $(".errormessage").show();
        }
        else{

            const requestData ={
                Email,
            _token: CSRFToken
            };
                console.log(requestData);

                $.ajax({
            url: '/reset',
            method: 'POST', 
            data: requestData,
            success: function(response) {
                console.log(response);
                $(".message").text(response.message);
            $(".message").show();
            },
            error: function(xhr, status, error) {
                console.log(error);
                var errorMessage = JSON.parse(xhr.responseText);
                console.log(errorMessage);
                $(".errormessage").text(errorMessage.errormessage);
                $(".errormessage").show();

            }
        });

        }
   }
    </script>


    
@endsection