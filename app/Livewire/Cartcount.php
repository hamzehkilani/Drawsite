<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart;

class Cartcount extends Component
{
    public $cartcount=0;
    public function getcartcount(){
      $this->cartcount=Cart::where('user_id',auth()->user()->id)->count();
    }

    public function render()
    {
$this->getcartcount();
        return view('livewire.cartcount');
    }
}
