<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\messages;
use App\Models\friends;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon; // Import Carbon from Illuminate\Support

class Testchat extends Component
{
    public $userinfo=[];
    public $friends = [];
    public $selectedUserId;
    public $messages = [];
    public $newMessage = '';
    public $iswritting = true;

    public $click= false;

    public function mount()
    {
        $this->loadFriends();
        $this->iswritting = false; 

    }
    public function userLeavingPage()
    {
        logger('Destroy method called');

        $user_id=auth::id();
        messages:: where('recever_id',$user_id);
        $this->dispatch('userLeftPage');
    }
    public function stopTyping()
    {
        $this->iswritting = false;
    }
    


   

    public function showmassages($userId)
    {
        $this->click= true;
        $this->updateusernotfiaction($userId);
        $this->loadMessages($userId);
    }

    public function loadFriends()
    {
        $loginUser = auth()->user()->id;
        $this->friends =$this->userfrind($loginUser);
    }
    
    public function updateusernotfiaction($userId)
    {
        $user_di=Auth::id();
        messages::where('sender_id',$userId)
        ->where('recever_id',$user_di)
        ->update(['stauts' => '1']);
        
    }

    public function loadMessages($userId)
    {
        $authenticatedUserId = auth()->id();
        $this->selectedUserId = $userId;
        $this->messages = messages::with('user')
            ->where(function ($query) use ($userId, $authenticatedUserId) {
                $query->where('sender_id', $authenticatedUserId)->where('recever_id', $userId)
                    ->orWhere('sender_id', $userId)->where('recever_id', $authenticatedUserId);
            })
            ->get()
            ->map(function ($message) use ($authenticatedUserId) {
                $message->isSender = $message->sender_id == $authenticatedUserId;
                return $message;
            });

            dd($this->messages);

    }

  

    public function sendMessage()
    {
        if ($this->newMessage) {

            messages::create([
                'sender_id' => auth()->id(),
                'recever_id' => $this->selectedUserId,
                'content' => $this->newMessage,
            ]);
          
            $this->loadMessages($this->selectedUserId);
            $this->newMessage = '';
            $this->loadFriends();
            $this->dispatch('messageSent', $this->selectedUserId);

            $this->refreshMessages();

           
        }
       

    }
    public function refreshMessages()
    {
        $this->loadMessages($this->selectedUserId);
        $this->updateusernotfiaction($this->selectedUserId);
    }
    public function countUnreadMessages($userId)
    {
        return messages::where('recever_id', auth()->id())
            ->where('sender_id', $userId)
            ->where('stauts', 0)
            ->count();
    }

    public function lastmesage($userId)
    {
        return messages::where('recever_id', auth()->id())
        ->where('sender_id', $userId)
        ->where('stauts', 1)->
        orwhere('stauts', 0)
        ->latest() 
        ->limit(1)
        ->get();
    }
     public function formatTimestamp($timestamp)
    {
        $now = Carbon::now();
        $messageTime = Carbon::parse($timestamp);

        if ($messageTime->isSameDay($now)) {
            return $messageTime->format('H:i');
        } elseif ($messageTime->isYesterday($now)) {
            return 'Yesterday';
        } else {
            return $messageTime->format('Y-m-d');
        }
    }

    public function userfrind($loginUser){
        return $user_frind = friends::where('friend_id', $loginUser)
        ->orWhere('user_id', $loginUser)
        ->where('stuts', 1)
        ->get();
    }
    public function render()
    {
        $loginUser = Auth()->user()->id;

        $friends =$this->userfrind($loginUser);
        $lastMessages = [];
        foreach ($friends as $friend) {
            $lastMessages =$this->lastmesage($friend->id);
        }

        return view('livewire.testchat', [
            'friends' => $friends,
            'lastMessages' => $lastMessages,
        ]);
    }
}