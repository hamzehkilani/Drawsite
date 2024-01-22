<?php 
namespace App\IRepository;
use Illuminate\Http\Request;

interface Adminpagesinterface{
    public function index();
    public function usersindex();
    public function Paintersindex();

    public function indexEvents();
    public function indexProducts();
    public function createProduct(Request $request);
    public function createDiscount(Request $request);

    
}