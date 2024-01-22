@extends('layout')
@section('content')
@foreach ($userData as $user)

<style>
    div#intro {
    display: none;
}
nav.navbar.navbar-expand-lg.d-lg-block {
    z-index: 2000;
    background: linear-gradient( 45deg, rgb(73 76 75 / 55%), rgba(91, 14, 214, 0.7) 100% ) !important;
    color: white;
}

   .userinfo {
    display: flex;
  justify-content: center;
  align-items: center;  
   }

   .commentuser {
    padding: 13px;
    font-size: 14px;
}
   img.profile-img {
    width: 206px;
    height: 176px;
    border-radius: 119px;
    margin: 10px;
    }
    .userinfo{
        flex-direction: column;
    }
    .d-felx.userprfoleinfo {
        display: flex;
    flex-direction: column;
    align-items: center;
    margin: 12px;
}
.forprofilesmes{
    color: #000000;
    font-size: 15px;
    margin-left: 10px;
    margin-right: 3px;
}

.social_media {
    width: 92px;
    display: flex;
    justify-content: space-between;
    margin: 11px;
}

.username {
    font-size: 22px;
    font-weight: 600;
}
    .user-background {
        position: relative;
    }

    .background-img {
        width: 100%;
        height: 300px; /* Adjust the height as needed */
        object-fit: cover;
    }

    .background-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient( 45deg, rgb(73 76 75 / 55%), rgba(91, 14, 214, 0.7) 100% ) !important;
    }

    /* Additional styling for the overlay content (optional) */
    .overlay-content {
        color: white;
        font-size: 24px;
        text-align: center;
    }
    .numberfp {
        display: flex;
    justify-content: space-between;
    width: 245px;
    margin: 11px;
}
.fp {
    font-weight: 600;
}
.count {
    margin-top: 0px;
    margin-left: 3px;
    margin-right: 10px;
    font-weight: 900;
    color: #00000063;
}

.card-body {
    display: flex;
    flex-direction: column;
    align-items: center;
}
.profile-img-post{
    width: 45px !important;
    height: 45px !important;
    border-radius: 119px !important;
    margin: 10px !important;
}
.lms-btn{
    border: 0px;
    width: 154px;
    height: 47px;
    background-color: white;
    display: flex;
    align-items: center;
}

.fa-thumbs-up{
    color: #787878;
margin-right: 5px;
}

.fa-comments{
    color: #787878;
margin-right: 5px;
}
.fa-share{
    color: #787878;
margin-right: 5px;
}
.card-footer{
    display: flex;
    justify-content: space-between;
}
.likeandcomments {
    display: flex;
    justify-content: space-between;
    flex-direction: row;
    align-items: center;
    width: 100%;
}
.countcl{
    display: flex;
    flex-direction: row;
    align-items: center;
}
.facbookicon {
    background-color: blue;
    width: 25px;
    text-align: center;
    height: 23px;
    border-radius: 142px;
    margin: 2px !important;
}
.comments {
    font-size: 22px;
    margin-right: 7px;
    font-weight: 500;
}
.commentnumber {
    font-size: 18px;
    font-weight: 400;
    color: #757575;
    height: 26px;
    margin-left: 11px;
}
button.close {
    background-color: #eee;
    border: 0px;
    width: 39px;
    height: 40px;
    border-radius: 23px;
    font-size: 25px;
    text-align: center;
}
.cutsomaddpost {
    display: flex;
    flex-direction: row;
    /* justify-content: space-around; */
    align-items: center;
}
.custominput {
    width: 100%;
    height: 43px;
    border-radius: 26px;
    border: 1px solid #ababab;
}
.custominput:focus-visible {
    width: 100%;
    height: 43px;
    border-radius: 26px;
    border: 1px solid #ababab !important;
}
.inputandicons{
    display: flex;
    align-items: center;
}
.addpostdiv{
    display: flex;
    justify-content: center;
}
.forauthpostsuser{
    display: flex;
    flex-direction: column;
    align-items: center;

}
.dateforpost {
    margin-left: 41px;
    margin-top: -19px;
}
.add-comment {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 12px;

}
@media (min-width: 1200px) {
    .the-size {
        width: 953px;
        margin: auto;
    }

    .the-size-model{
        max-width: 953px !important;
        width: 953px;
        margin: auto;
    }
}
    

@media (max-width: 1200px) and (min-width: 800px){
.the-size {
    max-width: 727px !important;
    width: 727px;
    margin: auto;
}
.the-size-model{
        max-width: 727px !important;
        width: 727px;
        margin: auto;
    }
}

@media (max-width: 800px) and (min-width: 600px){
.the-size {
    max-width: 573px !important;
    width: 573px;
    margin: auto;
}
.the-size-model{
        max-width: 573px !important;
        width: 573px;
        margin: auto;
    }
}
@media (max-width: 600px) and (min-width: 350px){
.the-size {
    max-width: 355px !important;
    width: 355px;
    margin: auto;
}
.the-size-model{
    max-width: 355px !important;
            width: 500px;
        margin: auto;
    }
    .d-flex.justify-content-between.align-items-center {
    font-size: 13px;
    margin-right: 14px;
}


}



</style>

<section class="user-background">
    <img src="{{ asset('storage/' . ($user->backgroundimg ?? 'backgroundimg/botanical-leaves.jpg')) }}" class="background-img" alt="User Background" />
    <div class="background-overlay">
        <div class="overlay-content">
        </div>
    </div>
</section>

<section >
    
<div class="d-flex userinfo "> 
            <input  hidden ="text" id="p_user_id" value="{{$user->id}}">
    <div class="d-felx userprfoleinfo">    
    <img src="{{ asset('storage/' . ($user->userimg?$user->userimg:'userimg/defaultimg.jpg')) }}"   class="profile-img item3" oncontextmenu="return false";/> 
   <div class="username"> {{$user->name}}</div>
   <div class="social_media">
    <a href="#"><i class="fa-brands fa-facebook fa-xl" style="color: #075ef2;"></i></a>
    <a href="#"> <i class="fa-brands fa-linkedin fa-xl" style="color: #005eff;"></i></a>
    <a href="#"><i class="fa-brands fa-instagram fa-xl"></i></a>
   </div>
</div> 
@guest
<div class="messeagefindes">
    <button class="btn headerbtn" id="loginmodel">  <i class=" fas fa-regular fa-user-group" style="color: #fafafa;"></i> Add frind</button>
    <button class="btn" id="loginmodel"><i class="fa-brands fa-facebook-messenger forprofilesmes" style="color: #000000;"></i> Message </button>
    </div>
@endguest
@auth
@if(($user->id)==auth()->user()->id)
@else
@if ($stuts==1)
<div class="messeagefindes">
    <button class="btn headerbtn frind" id="user_id_want_remove" value="{{$user->id}}">  <i class=" fas fa-regular fa-user-group" style="color: #fafafa;"></i> Remove Frind</button>
    @elseif ($stuts==3)
    <div class="messeagefindes">
        <button class="btn headerbtn frind" id="user_id_want_remove" value="{{$user->id}}">  <i class=" fas fa-regular fa-user-group" style="color: #fafafa;"></i>Request Sent</button>
        @elseif ($stuts==2)
        <div class="messeagefindes">
            <button class="btn headerbtn frind" id="user_id_want_accept" value="{{$user->id}}">  <i class=" fas fa-regular fa-user-group" style="color: #fafafa;"></i>Accept Request</button>
    @else
    <div class="messeagefindes">
        <button class="btn headerbtn frind" id="user_id_want_sent" value="{{$user->id}}">  <i class=" fas fa-regular fa-user-group" style="color: #fafafa;"></i>Add frind</button>
@endif
<button class="btn"><i class="fa-brands fa-facebook-messenger forprofilesmes" style="color: #000000;"></i> Message </button>
    </div>
    @endif

@endauth

<div class="numberfp">
    <div class="d-flex align-items-center" style="flex-direction: column-reverse;">
        <div class="fp">Posts</div>
        <div class="count">{{$countpost}}</div>
    </div>
        <div class="d-flex align-items-center" style="flex-direction: column-reverse;">
            <div class="fp">Followers</div>
            <div class="count frindcount" value="{{$Followers}}">{{$Followers}}</div>
        </div>

        <div class="d-flex align-items-center" style="flex-direction: column-reverse;">
            <div class="fp">Following</div>
            <div class="count frindfollowcount">{{$Following}}</div>
        </div>
</div>
</div>
  </section>
  @endforeach
  <hr class="my-5" />
  @auth
@if((($user->id)==auth()->user()->id) && (auth()->user()->role == "Painters"))
<div class="the-size">
    <div class="card mt-4 cutsomaddpost">
    <div>
        <img src="{{ asset('storage/' . ($user->userimg?$user->userimg:'userimg/defaultimg.jpg')) }}" class="profile-img-post" oncontextmenu="return false";/> 
  </div>
  <div class="inputandicons the-size">
    <input  type="text" class="custominput" onclick="addposts()" placeholder="What Do You Think?">
    <i class="fa-regular fa-image fa-2xl" onclick="addposts()" style="color: #624ba0;  margin-left: -163px;"></i>
    <i class="fa-solid fa-video fa-2xl"  onclick="addposts()"style="color: #624ba0;  margin: 10px;"></i>
    <i class="fa-solid fa-cloud-arrow-up fa-2xl" onclick="addposts()" style="color: #624ba0;"></i>
  </div>
  
   
    </div>
</div>
<!-- Add Post Modal -->
<div class="modal" id="addPostModal"  aria-labelledby="addPostModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addPostModalLabel">Add Post</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closepostsmodel()">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="postForm" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="postTitle" required >Title *</label><div id="errortitle" style="color:red; display:none;">This Field Is required *</div>
                    <input type="text"  onclick="hideerromessage()" class="form-control" id="postTitle" placeholder="Enter post title" >
                </div>
                <div class="form-group mt-3">
                    <label for="postContent" required>Content *</label><div id="errorContent" style="color:red; display:none;" >This Field Is required*</div>
                    <textarea class="form-control" onclick="hideerromessage()"  id="postContent" rows="3" placeholder="Enter post content" ></textarea >
                </div>
                <div class="input-group mb-3 mt-3">
                    <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03">
                      Add Image
                    </button>
                    <input type="file" class="form-control" aria-describedby="inputGroupFileAddon03" aria-label="Upload"  id="postImage" name="postImage"  onchange="previewImage(this)" required/><div id="errorimage" style="color:red;display:none;">This Field Is required*</div>
                  </div>
                  <div class="mb-3 mt-3">
                  <img id="imagePreview" src="#" alt="Image Preview" style="max-width: 100%; display: none;">
                  </div>
                  <div class="addpostdiv">
                    <button type="button" class="btn headerbtn" onclick="addPost()">Add Post</button>

                  </div>
            </form>            
        </div>
    </div>
</div>
</div>
<!--end model posts -->
@endif
@endauth
<div id="fordata">
        
</div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
function getData() {
    var user_id = $("#p_user_id").val();    
    $.ajax({
      url: '/getuserposts/'+user_id,
      method: 'GET',
      dataType: 'html', 
      success: function(data) {
        console.log(data);

        $('#fordata').html(data);
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  }

  $(document).ready(function() {
    getData();

        $('#loginmodel').click(function() {
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
    });


  


});
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

    // Event delegation for the click handlers
$(document).on('click', '#user_id_want_remove', function() {
    let userId = $(this).val();
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $.ajax({
            type: 'POST',
            url: '/remove-friend', 
            data: { user_id: userId },
            success: function(response) {
                console.log(response);
                $(".frind").text('Add frind');
                var element = document.getElementById('user_id_want_remove');
    
    if (element) {
        element.setAttribute('id', 'user_id_want_sent');
    } else {
        console.error("Element with ID 'user_id_want_remove' not found");
    }

            },
            error: function(error) {
                console.error(error);
            }
        });
    });

$(document).on('click', '#user_id_want_sent', function() {
    let userId = $(this).val();
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $.ajax({
            type: 'POST',
            url: '/send-friend-request', // Replace with your actual route
            data: { user_id: userId },
            success: function(response) {
                // Handle success, e.g., update UI or show a message
                console.log(response);
                $(".frind").text('Request Sent');
                var element = document.getElementById('user_id_want_sent');
                element.setAttribute('id', 'user_id_want_remove');
                

            },
            error: function(error) {
                console.error(error);
            }
        });
    });

$(document).on('click', '#user_id_want_accept', function() {
    let userId = $(this).val();
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $.ajax({
            type: 'POST',
            url: '/accept-friend-request', 
            data: { user_id: userId },
            success: function(response) {
                console.log(response);
                $(".frind").text('Remove Frind');
                var element = document.getElementById('user_id_want_accept');
                element.setAttribute('id', 'user_id_want_remove');

            },
            error: function(error) {
                console.error(error);
            }
        });
    });

function addposts(){
    $("#addPostModal").modal('show');
    $("#errortitle").hide();
       $("#errorimage").hide();
       $("#errorContent").hide();
}
function closepostsmodel(){
    $("#addPostModal").modal('hide');

    }
function previewImage(input) {
        var imagePreview = document.getElementById('imagePreview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        }
    }


    function addPost() {
    var title = $('#postTitle').val();
    var content = $('#postContent').val();
    var image = $('#postImage')[0].files[0];

    if (title === '' && content === '' && typeof image === 'undefined') {
        console.log("u are here");
       $("#errortitle").show();
       $("#errorimage").show();
       $("#errorContent").show();

    }
        else if (title === '') {
            $("#errortitle").show();

        }
        else if (content === '') {
            $("#errorContent").show();
            $("#errorimage").show();

        }
        else if (typeof image === 'undefined') {
            $("#errorimage").show();
        }
    else {
        var formData = new FormData();
        formData.append('title', title);
        formData.append('content', content);
        formData.append('image', image);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '/add-post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                getData();
                $("#addPostModal").modal('hide');
                $("#postForm")[0].reset();
            },
            error: function(error) {
                console.error(error);
                $("#addPostModal").modal('hide');
            }
        });
    }
}
function hideerromessage(){
    $("#errortitle").hide();
       $("#errorimage").hide();
       $("#errorContent").hide();
}





    </script>

@endsection
