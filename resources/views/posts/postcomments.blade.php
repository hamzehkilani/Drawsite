
    <div class="card mt-4">
<div class="card-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <img src="{{ asset('storage/' . ($postData['user']->userimg?$postData['user']->userimg:'userimg/defaultimg.jpg')) }}" class="profile-img-post" oncontextmenu="return false";/> 
            <span class="ml-2">{{$postData['user']->name}}</span>
        </div>
        <div>
            <span class="text-muted postTimestampa" id="postTimestampa">{{$postData['post']->created_at}}</span>
        </div>
    </div>
</div>
<div class="card-body">
    <img src="{{asset('storage/' .( $postData['post']->image?$postData['post']->image:'postsimg/deful.jpg'))}}" alt="Post Image" class="background-img">
    <h5 class="card-title">{{$postData['post']->title}}</h5>
    <p>{{$postData['post']->content}}</p>
    <div class="likeandcomments">
        <div class="countcl">
            <div class="comments ">Comments:</div>
            <div class="commentnumber">  {{count($postData['post']->comments)}}</div>
    </div>
    <div class="countcl">
        <div class="facbookicon">
            <div class="fa fa-thumbs-up fa-xs" style="color:white; margin: 0px !important;"></div>
        </div>
        <div class="commentnumber" id="like-counts-{{$postData['post']->id}}">{{ count($postData['post']->likes)}}</div>
    </div>
    </div>
</div>
<div class="card-footer">
    @auth
    @if($postData['isLikedByAuthUser'][$postData['post']->id] == 0)
    <button class="lms-btn like-btn "id="like-button-{{ $postData['post']->id }}"  data-userid="{{ auth()->user()->id }}" data-postid="{{$postData['post']->id }}" onclick="toggleLike(this)"><i class="fa fa-thumbs-up" id="like-idd{{$postData['post']->id}}"></i> Like</button>
@else
    <button class="lms-btn like-btn "id="like-button-{{ $postData['post']->id }}"  data-userid="{{ auth()->user()->id }}" data-postid="{{ $postData['post']->id}}" onclick="toggleLike(this)"><i class="fa fa-thumbs-up" id="like-idd{{$postData['post']->id}}"  style="color:blue"></i> Like</button>
@endif
@endauth
    @guest
    <button class="lms-btn like-btn" id="loginmodel" onclick="showloginmode()"><i class="fa fa-thumbs-up"></i> Like</button>

    @endguest
    <button class="lms-btn comment-btn" id="comment_post_id" value="{{$postData['post']->id}}" ><i class="fa fa-comments"></i> Comment</button>
</div>
<div class="comment-section">
    <div class="comment-list" style="max-height: 200px; overflow: scroll;">
        @foreach ($comments->sortByDesc('created_at') as $comment)

        <div class="d-flex justify-content-between align-items-center">
            <div>
                <input hidden type="text" id="comment-{{$comment->id}}">
    
                <img 
                src="{{ asset('storage/' . ($comment->user && $comment->user->userimg ? $comment->user->userimg : 'userimg/defaultimg.jpg')) }}" 
                class="profile-img-post" 
                oncontextmenu="return false"
                />
                <span class="ml-2">{{$comment->user->name??"null"}}</span>
            </div>
            <div>
                <span class="text-muted postTimestampa" id="postTimestampa">{{$comment->created_at}}</span>
            </div>
        </div>
        <div class="commentuser">
            {{$comment->content}}
        </div>
    @endforeach
    

    </div>

    <div class="add-comment">
        <input  hidden type="text" id="comment_post_id" value="{{$postData['post']->id}}">
        <textarea class="form-control" placeholder="Add a comment"></textarea>
        <button class="btn headerbtn mt-3 mb-3" onclick="addComment()">Add Comment</button>
    </div>
</div>

</div>
<script>
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

  // Apply the formatting function to each timestamp element with the class 'postTimestampa'
  $('.postTimestampa').each(function() {
    formatTimestamp($(this));
  });
});
</script>
