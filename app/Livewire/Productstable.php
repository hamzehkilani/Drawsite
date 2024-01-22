<?php

namespace App\Livewire;

use App\Models\discount;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

use function Laravel\Prompts\error;

class Productstable extends Component
{
    use WithPagination , WithFileUploads;
   

    public $showUserModal = false;
 

    public $status ="active";
    #[Url(history:true)]
    public $search = '';

    #[Url(history:true)]
    public $sortByProduct = 'created_at';

    #[Url(history:true)]
    public $sortDirProduct = 'DESC';

    #[Url()]
    public $perPageProduct = 3;
    public $pageLoaded = false;
    public $discountdata;

    public function mount()
    {
        $baseUrl = 'http://127.0.0.1:8000/dashborad';
        $currentUrl = url()->current();
        if( $currentUrl== $baseUrl)
            {
                $this->pageLoaded = true;
            }
    
    }

    public function updatedSearch(){
        $this->resetPage();
    }
    
   public function showDiscount($userId)
   {
       $this->discountdata = Product::find($userId);
       
       $this->showUserModal = true;
   }

   public function closeUserModal()
   {
       $this->showUserModal = false;
   }

   

    public function delete(Product $Product){
        $Product->delete();
    }

    public function setSortByProduct($sortByField){

        if($this->sortByProduct === $sortByField){
            $this->sortDirProduct = ($this->sortDirProduct == "ASC") ? 'DESC' : "ASC";
            return;
        }

        $this->sortByProduct = $sortByField;
        $this->sortDirProduct = 'DESC';
    }

    public function render()
    {
        return view('livewire.productstable',
        [
            'Products' => Product::search($this->search)->with('discounts')
            ->orderBy($this->sortByProduct,$this->sortDirProduct)
            ->paginate($this->perPageProduct)
        ]
        );
    }
}
