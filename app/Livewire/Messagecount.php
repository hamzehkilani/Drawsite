<?php

namespace App\Livewire;

use App\Models\messages;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class Messagecount extends Component
{

    public $countmessage;

    public function refreshMessages()
    {
        $this->count(); // Call the count method to update the countmessage property
    }
    
    public function count()
    {
        $userid = Auth::id();
        $this->countmessage = messages::where('recever_id', $userid)->where('stauts', 0)->count();
    }
    
    public function render()
    {
        return view('livewire.messagecount', [
            'messagecount' => $this->countmessage, // Use $this->countmessage to reference the Livewire property
        ]);
    }
    
}
