<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\cart;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class Cartinfo extends Component
{
  
    public $cartdata;

    public $quantity;
    public $quantityitem;

    public $Totals;
    public $total;

    public $price=0;
    public function delete(Cart $cart){
     $cart->delete();
    $this->getdata();
    }

  public function minus($id){
    $cartiteam=Cart::where('user_id',auth()->user()->id)->where('product_id',$id)->first();
    $this->quantityitem=$cartiteam->quantity-1;
    if($this->quantityitem<=0){
        $cartiteam->delete();


    }
    else{
        $cartiteam->update(['quantity' => $this->quantityitem]);



    }
  }

  public function plus($id){
    $cartiteam=Cart::where('user_id',auth()->user()->id)->where('product_id',$id)->first();
    $this->quantityitem=$cartiteam->quantity+1;
    if($this->quantityitem<=0){
        $cartiteam->delete();

    }
    else{
        $cartiteam->update(['quantity' => $this->quantityitem]);


    }
  }
  public function getdata(){
    $this->cartdata = Cart::where('user_id', auth()->user()->id)->with('user', 'product', 'discounts')->get();
    $this->Totals = 0;
    $this->total=0;

    foreach ($this->cartdata as $data) {
        if ($data->discounts) {
            $price = $data->discounts->price_after_discount;
        } else {
            $price = $data->product->price;
        }

        $totalPriceForProduct = $price * $data->quantity;


        $this->Totals += $totalPriceForProduct;
    }

    $this->total= $this->Totals+5.99;
 
    
}


    
    public function render()
    {
        
        $this->getdata();

        return view('livewire.cartinfo');
    }
}
