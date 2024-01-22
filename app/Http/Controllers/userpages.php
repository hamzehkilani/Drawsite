<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\IRepository\UserspagesInterface;

class userpages extends Controller
{
    protected $Userpages;
    public function __construct(UserspagesInterface $_Userpages) {
        $this->Userpages = $_Userpages;
    }
    public function index()
    {
        return $this->Userpages->index();
    }

    
    public function editProfile($id)
    {
        return $this->Userpages->editProfile($id);

    }

    public function orders()
    {

        return $this->Userpages->orders();
    }

    public function events()
    {

        return $this->Userpages->events();
    }
    public function orderDetails($id)
    {
        return $this->Userpages->orderDetails($id);

       
    }
    public function indexProduct($id)
    {
        return $this->Userpages->indexProduct($id);

    }

    public function indexShop()
    {
        return $this->Userpages->indexShop();
    }
    public function updateUser(Request $request, $userId)
    {
        return $this->Userpages->updateUser($request, $userId);

    }
    public function newRequest()
    {
        return $this->Userpages->newRequest();
    }

    public function UpdateRequest(request $request)
    {
        return $this->Userpages->UpdateRequest($request);
    }

    public function clearFormSubmittedSession(){
        return $this->Userpages->clearFormSubmittedSession();

    }

}
