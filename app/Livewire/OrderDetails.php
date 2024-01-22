<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\order_product;

class OrderDetails extends Component
{

    public $orderId;

    public $order_info;
    public $total;
    

    public function render()
    {

        $order_id=$this->orderId;
        $this->order_info=order_product::where('order_id',$order_id)->with('product','order')->get();
            foreach($this->order_info as $order){
            $this->total=$order->order->total_amount ." $";
            }
        return view('livewire.order-details');
    }
}
