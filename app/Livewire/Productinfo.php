<?php


namespace App\Livewire;

use App\Models\rates;
use Livewire\Component;
use App\Models\payment;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class Productinfo extends Component
{

    public $ratevalue = '0';
    public $productId;
    public $averageRating;

    public $userRating;
    public $products;
    public $productdiscounts;
    public $stockquentity;

    public $issubscribe=0;
    function changeavg($product_id){
        $this->averageRating = rates::where('product_id', $product_id)
        ->avg('rate');
    }

      

    public function ratevalues($rating, $productId)
    {
        $user_id = auth()->user()->id;
    
        $userrate = rates::where([
            'user_id' => $user_id,
            'product_id' => $productId,
        ])->first();
    
        if ($userrate) {
            $userrate->update([
                'rate' => $rating,
            ]);
    
            $this->ratevalue = $rating;
            session()->flash('message', 'Thank you for updating your rating.');
        } else {
            rates::create([
                'user_id' => $user_id,
                'product_id' => $productId,
                'rate' => $rating,
            ]);
            $this->ratevalue = $rating;
            session()->flash('message', 'Thank you for Rating.');
        }
    }


    public function userRatings(){
        $this->userRating = rates::where('user_id', auth()->id())
        ->where('product_id',$this->productId)
        ->value('rate');
    }
    public function cheakSubAndPay(){
        if(Auth::user()){
            $this->issubscribe=payment::where('user_id',auth()->user()->id)->where('product_id',$this->productId)->first();
        }
    }
    public function getBookInof(){
        $this->products = product::where('id',$this->productId)->with('discounts','rate')->first();


    }
    public function getqunttinty(){
        $this->stockquentity=$this->products->stock_quantity;

    }
    public function getDiscountsproduct(){
        $this->productdiscounts =product::take(5)->with('discounts')->get();

    }
    public function render()
    {
        
        $this->userRatings();
        $this->cheakSubAndPay();
        $this->changeavg($this->productId);
        $this->getBookInof();
        $this->getDiscountsproduct();
        return view('livewire.productinfo');
    }


    

}
 

