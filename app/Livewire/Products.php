<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public $status = "active";
    public $show =true;

    public $search = '';
    public $perPageProduct = 8;


    public function allsearch(){
        $this->search='';
        if($this->perPageProduct==''){
            $this->perPageProduct=8;
        }
        else{
            $this->perPageProduct='';
        }

        $this->show=true;
    }

    public function showsalesonly(){
        $this->search='';
        $this->perPageProduct='';

        $this->show=false;
    }
    
    public function searchvalue(){
        $this->search='color';
        $this->show=true;

    }
    
    public function render()
    {
        return view('livewire.products', [
            'Products' => Product::search($this->search)->with('discounts')
            ->inRandomOrder()->paginate($this->perPageProduct),
        ]);
    }
}
