<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Component;
// app/Http/Livewire/SearchComponent.php


class SearchComponent extends Component
{
    public $searchTerm = '';
    public $perPage=5;
    public $click=false;
    public function searchclick(){
        if ($this->searchTerm==''){
             $this->click=false;

        }
        else{
            $this->click=true;
        }
    }
    public function render()
    {
        $this->searchclick();
        return view('livewire.search-component' , [
            'users' => User::search($this->searchTerm)->paginate($this->perPage),
        ]);
    }
}
