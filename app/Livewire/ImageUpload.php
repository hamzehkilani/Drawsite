<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
class ImageUpload extends Component
{
    use WithFileUploads;

    public $image;
    public $user; 

    public function render()
    {


        return view('livewire.image-upload');
    }
  
}


