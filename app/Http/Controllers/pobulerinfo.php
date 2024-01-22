<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\friends;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class pobulerinfo extends Controller
{
  public function index()
  {
      $popularPosts = Post::mostPopular()->get();

      $postsData = [];
  
      if (Auth::user()) {
          $authUserId = Auth::id();
  
          foreach ($popularPosts as $post) {
              $user = User::find($post->user_id);
              $isLikedByAuthUser = $post->likes()->where('user_id', $authUserId)->exists();
  
              if ($user) {
                  $postsData[] = ['user' => $user, 'post' => $post, 'isLikedByAuthUser' => $isLikedByAuthUser];
              }
          }
      } else {
          foreach ($popularPosts as $post) {
              $user = User::find($post->user_id);
  
              if ($user) {
                  $postsData[] = ['user' => $user, 'post' => $post];
              } else {
                  echo "There is no data";
              }
          }
      }
  
      return view('componts.posts', [
        'postsData' => $postsData ,

    ]);
  }
  public function toggleLike(Request $request)
{
    $user_id = $request->input('user_id');
    $post_id = $request->input('post_id');
    
    $existingLike = Like::where('user_id', $user_id)
        ->where('post_id', $post_id)
        ->first();

    if ($existingLike) {
        $existingLike->delete();
        $isLiked = false;
    } else {
        Like::create([
            'user_id' => $user_id,
            'post_id' => $post_id,
        ]);
        $isLiked = true;
    }

    $likeCount = Like::where('post_id', $post_id)->count();

    return response()->json(['isLiked' => $isLiked, 'likeCount' => $likeCount]);
}

public function usersprofile($userid, $postid)
{
    $user = User::find($userid);
    $posts = Post::where('user_id', $userid)->get();
    $Following = friends::where('user_id', $userid)->count();
    $Followers = friends::where('friend_id', $userid)->orwhere('user_id', $userid)->count();
    
    $countpost = count($posts);
    if (Auth::check()) {
        $user_id = Auth::id();
        $isFriendStatus1 = friends::where('user_id', $user_id)
        ->where('friend_id', $userid)
        ->where('stuts', 1)
        ->count();
    
    $isFriendStatus2 = friends::
    where('user_id', $user_id)
        ->where('friend_id', $userid)
        ->where('stuts', 2)
       ->count();
    $isFriendOfStatus1 = friends::where('friend_id', $user_id)
        ->where('user_id', $userid)
        ->where('stuts', 1)
        ->count();
    
    $isFriendOfStatus2 = friends::where('friend_id', $user_id)
        ->where('user_id', $userid)
        ->where('stuts', 2)
          ->count();

    if($isFriendStatus1>0||$isFriendOfStatus1>0){
        $stuts = 1; 
    }
    elseif($isFriendStatus2>0||$isFriendOfStatus2>0 ){
        if($isFriendStatus2>0){
        $stuts = 3; //if the user sent request show him request sent
        }
        else{
            $stuts = 2;// if the user get frind request
        }
    }
    else{
        $stuts = 0; 
    }
}
else{
    $stuts = 0;
}
    if ($postid == 0) {
        $userData = ['user' => $user];
        $postData = ['posts' => $posts ,'user'=>$user];
        return view('userspages.usersprofile', compact('userData', 'postData', 'countpost','stuts','Followers','Following'));
    } else {
        $custompost = Post::find($postid);
        $userData = ['user' => $user];
        $postData = ['posts' => $posts ,'user'=>$user];
        $customPostData = ['custompost' => $custompost];

        return view('userspages.usersprofile', compact('userData', 'postData', 'customPostData', 'countpost','stuts','Followers','Following'));
    }
}
public function getuserposts($userid) {
    $user = User::find($userid);

    $posts = Post::where('user_id', $userid)->orderBy('created_at', 'desc')->get();
    $isLikedByAuthUser = [];

    if (Auth::check()) {
        $authUserId = Auth::id();

        foreach ($posts as $post) {
            $isLikedByAuthUser[$post->id] = $post->likes()->where('user_id', $authUserId)->exists();
        }
    }

    $countpost = $posts->count();
    $posts->load('comments');
    $posts->load('likes');

    $postData = [
        'posts' => $posts,
        'user' => $user,
        'isLikedByAuthUser' => $isLikedByAuthUser, // Pass the array to the view
    ];

    return view('posts.profilepost', compact('postData', 'countpost'));
}




public function getcommentmodel($post_id) {
    $post = Post::find($post_id);
    $user = User::find($post->user_id);
    $post->load('likes', 'comments');
    $comments = Comment::where('post_id', $post_id)->with('user')->get();

   
    
    $isLikedByAuthUser = [];

    if (Auth::check()) {
        $authUserId = Auth::id();

            $isLikedByAuthUser[$post_id] = $post->likes()->where('user_id', $authUserId)->exists();
        
    }
    $postData = [
        'post' => $post,
        'user' => $user,
        'comments' =>$comments,
        'likes' => $post->likes, // Include the likes in the $postData array
        'isLikedByAuthUser' => $isLikedByAuthUser // Pass the array to the view

    ];
    return view('posts.postcomments', compact('postData','comments'));
}


public function loginmodel() {
    return view('componts.loginmodel');
}




public function removeFriend(Request $request)
{
    $userId = $request->input('user_id');
    Friends::where('user_id', auth()->id())
        ->where('friend_id', $userId)
        ->delete();
    return response()->json(['message' => 'Friend removed successfully']);
}

public function sendFriendRequest(Request $request)
{
    // Add any necessary validation logic

    $userId = $request->input('user_id');
    Friends::create([
        'user_id' => auth()->id(),
        'friend_id' => $userId,
        'stuts' => 2,
    ]);

    return response()->json(['message' => 'Friend request sent successfully']);
}

public function acceptFriendRequest(Request $request)
{
    // Add any necessary validation logic

    $userId = $request->input('user_id');
    Friends::where('user_id', $userId)
        ->where('friend_id', auth()->id())
        ->update(['stuts' => 1]);

    return response()->json(['message' => 'Friend request accepted successfully']);
}



public function addPost(Request $request)
{
    // Validate the request data, you may adjust the validation rules accordingly
    $validator = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:4800',
    ]);
   if ($validator) {
    
$user_id=Auth::id();
    $post = new Post();
    $post->title = $request->input('title');
    $post->content = $request->input('content');
    $post->user_id= $user_id;
 if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('postsimg', 'public');
        $post->image = $imagePath;
    }

    $post->save();

    // You can return a response if needed
    return response()->json(['message' => 'Post added successfully']);
}
else{
    return redirect()->back()->withErrors($validator)->withInput();

}

}



public function addComment(Request $request)
{
    $request->validate([
        'post_id' => 'required|exists:posts,id',
        'content' => 'required|string|max:255',
    ]);

    $comment = new Comment([
        'post_id' => $request->post_id,
        'user_id' => auth()->user()->id,
        'content' => $request->content,
    ]);

    $comment->save();

    return response()->json(['message' => 'Comment added successfully', 'commentId' => $comment->id]);
}
}