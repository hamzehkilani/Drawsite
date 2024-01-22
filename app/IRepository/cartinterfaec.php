<?php 
namespace App\IRepository;
use Illuminate\Http\Request;

interface Cartinterfaec{

    public function index();
    public function checkOut();
    public function create(Request $request);
    public function placeorder(request $request);
}