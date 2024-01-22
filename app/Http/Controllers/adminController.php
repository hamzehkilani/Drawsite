<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\IRepository\Adminpagesinterface;
class adminController extends Controller
{
    protected $adminpages;
    public function __construct(Adminpagesinterface $_adminpages)
    {
        $this->adminpages = $_adminpages;
    }
    public function index()
    {
        return $this->adminpages->index();
    }

    public function usersindex()
    {
        return $this->adminpages->usersindex();
    }
    public function Paintersindex()
    {
        return $this->adminpages->Paintersindex();
    }
    public function indexEvents()
    {
        return $this->adminpages->indexEvents();
    }
    public function indexProducts()
    {
        return $this->adminpages->indexProducts();
    }
    public function createProduct(Request $request)
    {
        return $this->adminpages->createProduct($request);

    }
    public function createDiscount(Request $request)
    {
        return $this->adminpages->createDiscount($request);
    }
}
