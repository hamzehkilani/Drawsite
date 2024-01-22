
@foreach ($postData['posts'] as $post)
<div class="the-size">
    <div class="card mt-4">
<div class="card-header">
    @auth
      @if($post->user_id==auth()->user()->id)  
      <div class="d-flex justify-content-between align-items-center">
        <div class="forauthpostsuser">
            <div>
                <img src="{{ asset('storage/' . ($postData['user']->userimg?$postData['user']->userimg:'userimg/defaultimg.jpg')) }}" class="profile-img-post" oncontextmenu="return false";/> 
                <span class="ml-2">{{$postData['user']->name}}</span>
            </div>
        <div class="dateforpost">
            <span class="text-muted postTimestamp" >{{$post->created_at}}</span>
        </div>
    </div>
    <i class="fa-solid fa-ellipsis-vertical fa-xl editicon" id="{{$post->id}}" onclick="editpost()"></i>
    </div>  
      @else
      <div class="d-flex justify-content-between align-items-center">
        <div>
            <img src="{{ asset('storage/' . ($postData['user']->userimg?$postData['user']->userimg:'userimg/defaultimg.jpg')) }}" class="profile-img-post" oncontextmenu="return false";/> 
            <span class="ml-2">{{$postData['user']->name}}</span>
        </div>
        <div>
            <span class="text-muted postTimestamp" >{{$post->created_at}}</span>
        </div>
    </div>  
      @endif
    @endauth
    @guest
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <img src="{{ asset('storage/' . ($postData['user']->userimg?$postData['user']->userimg:'userimg/defaultimg.jpg')) }}" class="profile-img-post" oncontextmenu="return false";/> 
            <span class="ml-2">{{$postData['user']->name}}</span>
        </div>
        <div>
            <span class="text-muted postTimestamp" >{{$post->created_at}}</span>
        </div>
    </div>  
    @endguest

</div>
<div class="card-body">
    <img src="{{asset('storage/' . ($post->image?$post->image:'postsimg/deful.jpg'))}}" alt="Post Image" class="background-img">
    <h5 class="card-title">{{$post->title}}</h5>
    <p>{{$post->content}}</p>
    <div class="likeandcomments">
        <div class="countcl">
            <div class="comments ">Comments:</div>
            <div class="commentnumber">  {{count($post->comments)}}</div>
    </div>
    <div class="countcl">
        <div class="facbookicon">
            <div class="fa fa-thumbs-up fa-xs" style="color:white; margin: 0px !important;"></div>
        </div>
        <div class="commentnumber" id="like-count-{{$post->id}}">{{count($post->likes)}}</div>
    </div>
    </div>
</div>
<div class="card-footer">
    @guest
    <button class="lms-btn like-btn" id="loginmodel" onclick="showloginmode()"><i class="fa fa-thumbs-up" ></i> Like</button>
    @endguest
    @auth
    @if($postData['isLikedByAuthUser'][$post->id] == 0)
    <button class="lms-btn like-btn "id="like-button-{{ $post->id }}"  data-userid="{{ auth()->user()->id }}" data-postid="{{ $post->id }}" onclick="toggleLike(this)"><i class="fa fa-thumbs-up" id="like-id{{$post->id}}"></i> Like</button>
@else
    <button class="lms-btn like-btn "id="like-button-{{ $post->id }}"  data-userid="{{ auth()->user()->id }}" data-postid="{{ $post->id }}" onclick="toggleLike(this)"><i class="fa fa-thumbs-up" id="like-id{{$post->id}}"  style="color:blue"></i> Like</button>
@endif

    @endauth
    <button class="lms-btn comment-btn" id="comment_post_{{$post->id}}" value="{{$post->id}}">
        <i class="fa fa-comments"></i> Comment
    </button>
</div>
</div>
</div>

<div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
    <div class="modal-dialog the-size-model" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="commentModalLabel">{{$post['user']->name}}</h5>
                <button type="button" class="close" onclick="closea()">
                    <span aria-hidden="true">&times;</span>
                </button>
                
            </div>
            <div class="modal-body forpostdata">
            </div>
        </div>
    </div>
</div>


@endforeach

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<script>

function closea(){
    console.log("u are here");
        $('#commentModal').modal('hide');
    }

$(document).ready(function() {
  function formatTimestamp(timestampElement) {
    const postTimestamp = timestampElement.text();
    const postDate = new Date(postTimestamp);
    const currentDate = new Date();
    const timeDifferenceInHours = (currentDate - postDate) / (1000 * 60 * 60);
    let formattedDate;
    if (timeDifferenceInHours >= 24) {
      const days = Math.floor(timeDifferenceInHours / 24);
      formattedDate = `${days} day${days !== 1 ? 's' : ''} ago`;
    } else {
      formattedDate = `${Math.floor(timeDifferenceInHours)} hour${timeDifferenceInHours >= 2 ? 's' : ''} ago`;
    }
    timestampElement.text(formattedDate);
  }

  $('.postTimestamp').each(function() {
    formatTimestamp($(this));
  });
});



$(document).ready(function () {
    $('.comment-btn').click(function () {
    var post_id = $(this).val();
    console.log(post_id);
    $.ajax({
        url: "/get-comment-data/" + post_id,
        method: 'GET',
        dataType: 'html',
        success: function (data) {
            console.log(data);
            $('#commentModal').modal('show');
            $('.forpostdata').html(data);
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
});



});

function getcommentdata(){

    var post_id = $("#comment_post_id").val(); 
    console.log(post_id);
    $.ajax({
        url: "/get-comment-data/" + post_id,
        method: 'GET',
        dataType: 'html',
        success: function (data) {
            console.log(data);
            $('.forpostdata').html(data);
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });

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
    var likeCountsElement = $('#like-counts-' + postId);

    
    if (isLiked) {
        $('#like-id' + postId).css('color', 'blue');
        $('#like-idd' + postId).css('color', 'blue');

       
} else {
    $('#like-id' + postId).css('color', '#787878');
    $('#like-idd' + postId).css('color', '#787878');


}
    likeCountElement.text(likeCount);
    likeCountsElement.text(likeCount);
}



function addComment(){
    var post_id = $("#comment_post_id").val(); 
    var content = $('.add-comment textarea').val();
    $.ajax({
        type: 'POST',
        url: "{{ route('add.comment') }}",
        data: {
            post_id: post_id,
            content: content,
            _token: '{{ csrf_token() }}',
        },
        success: function(response) {
            console.log(response);
            getcommentdata();
            $('.add-comment textarea').val('');
            var newCommentId = response.commentId;
    console.log('New Comment ID:', newCommentId);
        },
        error: function(error) {
            console.error(error);
        }
    });
}


</script>
