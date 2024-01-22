<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\userpages;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProxyController;
use App\Http\Controllers\pobulerinfo;
use App\Http\Controllers\chatapp;
use App\Http\Controllers\cartcontroller;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [userpages::class,'index']);

    Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/home', [userpages::class,'index'])->name('homepage');
    Route::get('/AboutUs', [userpages::class,'AboutUs'])->name ('aboutus');
    Route::get('/rest-password', [AuthController::class, 'RestPassword'])->name('forget.password');
    Route::get('/login-model', [pobulerinfo::class,'loginmodel']);

    });
    Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/add-post', [pobulerinfo::class, 'addPost']);
    Route::post('/remove-friend', [pobulerinfo::class, 'removeFriend']);
    Route::post('/send-friend-request', [pobulerinfo::class, 'sendFriendRequest']);
    Route::post('/accept-friend-request', [pobulerinfo::class, 'acceptFriendRequest']);
    Route::get('/chat', [chatapp::class,'index'])->name('chat');
    Route::post('/add-comment', [pobulerinfo::class,'addComment'])->name('add.comment');
    Route::post('/toggle-like', [pobulerinfo::class,'toggleLike']);
    Route::post('/add-to-cart', [cartcontroller::class,'create'])->name('buy.products');
    Route::get('/Cart-info', [cartcontroller::class,'index'])->name('Cartinfo');
    Route::get('/Cheakout', [cartcontroller::class,'checkOut'])->name('checkOut');
    Route::post('/placeorder', [cartcontroller::class,'placeorder'])->name('placeorder');
    Route::get('/EditProfile/{id}', [userpages::class,'editProfile'])->name('EditProfile');
    Route::post('EditProfile/update-user/{userId}', [userpages::class,'updateUser'])->name('update.user');
    Route::get('/Orders', [userpages::class,'orders'])->name('user.order');
    Route::get('/Events', [userpages::class,'events'])->name('user.events');
    Route::get('/orderDetails/{orderId}', [userpages::class,'orderDetails'])->name('user.orderDetails');
    Route::get('/NewRequest', [userpages::class,'newRequest'])->name('user.newrequest');
    Route::post('user/updaterequest', [userpages::class,'UpdateRequest'])->name('user.updaterequest');
    Route::get('/clear-form-submitted-session', [userpages::class,'clearFormSubmittedSession']);

    });
    Route::middleware(['auth','role'])->group(function () {
    Route::get('/dashborad', [adminController::class,'index'])->name('admin.dashborad');
    Route::get('/dashborad/users', [adminController::class,'usersindex'])->name('admin.users');
    Route::get('/dashborad/Painters', [adminController::class,'Paintersindex'])->name('admin.Painters');
    Route::get('/dashborad/Events', [adminController::class,'indexEvents'])->name('admin.events');
    Route::get('/dashborad/Products', [adminController::class,'indexProducts'])->name('admin.products');
    Route::post('/dashborad/CreateProduct', [adminController::class,'createProduct'])->name('admin.create.product');
    Route::post('/dashborad/createDiscount', [adminController::class,'createDiscount'])->name('create.descount');
    });
    // Route use in auth and gust
    Route::get('/home', [userpages::class,'index'])->name('homepage');
    Route::get('/productinfo/{id}', [userpages::class,'indexProduct'])->name('Productpage');
    Route::get('/Shop', [userpages::class,'indexShop'])->name('Shoppage');

    Route::get('/AboutUs', [userpages::class,'AboutUs'])->name('aboutus');
    Route::get('/email-verified/{token}', [AuthController::class,'verifyEmail'])->name('verify.email');
    Route::get('/newpassword/{token}', [AuthController::class,'newpassword']);
    Route::post('/reset', [AuthController::class, 'MailReset']);
    Route::get('/reset-password/{id}/{token}', [AuthController::class, 'showpagenewpassword']);
    Route::put('/resetpasswordconf/{id}', [AuthController::class, 'savenewpassword']);
    Route::get('/get-most-pobuler-posts', [pobulerinfo::class,'index']);
    Route::get('/getuserposts/{userid}', [pobulerinfo::class,'getuserposts']);
    Route::get('/usersprofile/{userid}/{postid}', [pobulerinfo::class,'usersprofile']);
    Route::get('/get-comment-data/{post_id}', [pobulerinfo::class,'getcommentmodel']);
    //end routes