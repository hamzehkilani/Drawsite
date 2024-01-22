<div id="customSlider" class="carousel carousel-dark slide">
    <div class="carousel-inner">
      @foreach ($postsData as $index => $data)
        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" data-bs-interval="10000">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-12 mb-4 changesize">
              <div class="card">
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                  <img src="{{ asset('storage/' . ($data['post']->image?$data['post']->image:'postsimg/deful.jpg')) }}" class="img-fluid"  oncontextmenu="return false";/>
                  <a href="/usersprofile/{{$data['user']->id}}/{{$data['post']->id}}">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                  </a>
                </div>
                <div class="card-body text-center">
                  <h5 class="card-title">{{ $data['post']->title }}</h5>
                  <p class="card-text" id="content-{{ $index }}">
                    {{ implode(' ', array_slice(explode(' ', $data['post']->content), 0, 20)) }}
                    @if (str_word_count($data['post']->content) > 20)
                      <span id="dots-{{ $index }}">...</span>
                      <span id="more-{{ $index }}" style="display:none;">
                        {{ implode(' ', array_slice(explode(' ', $data['post']->content), 20)) }}
                      </span>
                      <a href="javascript:void(0);" onclick="toggleContent({{ $index }})" id="read-more-{{ $index }}">Show more</a>
                    @endif
                  </p>

                   
                  <div class="d-flex userforpostinfo" > 
                    <div>
                        <input hidden type="text" value="{{$data['user']->id}}">
                        <a href="/usersprofile/{{$data['user']->id}}/0" class="ausersprofile"><img src="{{ asset('storage/' . ($data['user']->userimg?$data['user']->userimg:'userimg/defaultimg.jpg')) }}" class="user-img"  oncontextmenu="return false";/>
                            {{$data['user']->name}}</a>
                        
                    </div>
                    @guest
                    <div class="d-flex align-items-center ">
                        <a >{{ $data['post']->likes_count }}</a>
                        <i class="fa-solid fa-heart   forhearticon" style="color: #d60015;"></i>
                   </div>
                   
                    @endguest
                    @auth
                    @if ($data['isLikedByAuthUser'] == 0)
                    <div class="d-flex align-items-center">
                        <a id="like-count-{{ $data['post']->id }}">{{ $data['post']->likes_count }}</a>
                        <i  id="like-button-{{ $data['post']->id }}" class="fa-regular fa-heart forhearticon" style="color: #e00000;" data-userid="{{ auth()->user()->id }}" data-postid="{{ $data['post']->id }}" onclick="toggleLike(this)"></i>
                    </div>
                @else
                    <div class="d-flex align-items-center">
                        <a id="like-count-{{ $data['post']->id }}">{{ $data['post']->likes_count }}</a>
                        <i  id="like-button-{{ $data['post']->id }}" class="fa-solid fa-heart forhearticon" style="color: #d60015;" data-userid="{{ auth()->user()->id }}" data-postid="{{ $data['post']->id }}" onclick="toggleLike(this)"></i>
                    </div>
                @endif
                
                
                    @endauth
                   

                   </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#customSlider" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#customSlider" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  
  
  <script>
    function toggleContent(index) {
      var dots = document.getElementById('dots-' + index);
      var moreText = document.getElementById('more-' + index);
      var btnText = document.getElementById('read-more-' + index);
  
      if (dots.style.display === 'none') {
        dots.style.display = 'inline';
        moreText.style.display = 'none';
        btnText.innerHTML = 'Show more';
      } else {
        dots.style.display = 'none';
        moreText.style.display = 'inline';
        btnText.innerHTML = 'Show less';
      }
    }

    function toggleLike(icon) {
    var user_id = $(icon).data('userid');
    var post_id = $(icon).data('postid');
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: '/toggle-like',
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        data: {
            user_id: user_id,
            post_id: post_id
        },
        success: function(response) {
            console.log('Like toggled successfully.');
            updateLikeUI(post_id, response.isLiked, response.likeCount);
        },
        error: function(error) {
            console.error('Error toggling like:', error);
        }
    });
}

function updateLikeUI(postId, isLiked, likeCount) {
  console.log(postId);
    var likeButton = $('#like-button-' + postId);
    var likeCountElement = $('#like-count-' + postId);
    if (isLiked) {
        likeButton.addClass('fa-solid').removeClass('fa-regular').css('color', '#d60015');
    } else {
        likeButton.removeClass('fa-solid').addClass('fa-regular').css('color', '#e00000');
    }

    likeCountElement.text(likeCount);
}





   

  
   
  </script>
  