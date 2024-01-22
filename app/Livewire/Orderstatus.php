<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\orders;
use Carbon\Carbon;


class Orderstatus extends Component
{

    public $orders;


    public function render()
    {
        $this->orders = orders::where('user_id', auth()->user()->id)->get();

        

        return view('livewire.orderstatus');
    }
}
