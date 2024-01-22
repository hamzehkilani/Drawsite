<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class Counts extends Component
{

    public $userscount;
    public $admincount;
    public $paintercount;
    public $eventscount;
    public $blockedcount;
    public $Productscount;


   
    public function mount()
    {
        $this->userscount = User::count();
        $this->admincount = User::where('role', 'admin')->count();
        $this->blockedcount = User::where('status','blocked')->count();
        $this->paintercount = User::where('role', 'Painters')->count();
        $this->eventscount = Event::count();
        $this->Productscount = Product::count();

    }
    

    public function render()
    {
        return view('livewire.counts');
    }
}
