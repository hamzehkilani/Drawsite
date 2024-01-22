<?php 
namespace App\IRepository;
use Illuminate\Http\Request;

interface UserspagesInterface{

    public function index();

    public function orders();
    public function events();

    public function editProfile($id);


    public function orderDetails($id);
    public function indexProduct($id);
    public function indexShop();
    public function updateUser(Request $request, $userId);
    public function newRequest();
    public function UpdateRequest(Request $request);

    public function clearFormSubmittedSession();




}
