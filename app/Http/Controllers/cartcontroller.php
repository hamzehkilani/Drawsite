<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\IRepository\Cartinterfaec;
class cartcontroller extends Controller
{

    protected $cartpages;
    public function __construct(Cartinterfaec $_cartpages) {
        $this->cartpages = $_cartpages;
    }
    public function index()
    {
        return $this->cartpages->index();
    }
    public function checkOut()
    {
        return  $this->cartpages->checkOut();

       
    }

    public function create(Request $request)
    {
        return $this->cartpages->create($request);
    }

    public function placeorder(request $request)
    {
        return $this->cartpages->placeorder($request);

    }
}
