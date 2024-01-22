<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\messages;
use app\Models\User;
use app\Models\friends;
class chatapp extends Controller
{

public function index(){
    return view("chat.livechat");

}
}
