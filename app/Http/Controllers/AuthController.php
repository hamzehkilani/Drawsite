<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use App\Mail\WelcomeEmail;
use App\Mail\passwordrest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\resetpasswordtoken;
class AuthController extends Controller
{
   
    public function showLoginForm(){
        return view("auth.login");
    }

    public function login(Request $request)
    {
        if($request->referrerUrl){
            $currentUrl=$request->referrerUrl;
        }
        else{
            $currentUrl = request()->url();
        }
                $request->validate([
            'Email' => 'required|email',
            'Password' => 'required',
        ]);
        $user = User::where('email', $request->Email)->first();
    
        if (!$user) {
            return response()->json(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
        }
    
        if ($user->is_verified == 0) {
            $verificationUrl ="http://127.0.0.1:8000/email-verified/".$user->verification_token;
    
            Mail::to($user->email)->send(new WelcomeEmail($verificationUrl));
    
            return response()->json(['message' => 'Verification email sent. Please check your email to verify your account.'], Response::HTTP_UNAUTHORIZED);
        }
        else{
            if (Hash::check($request->Password, $user->password)) {
                Auth::login($user);
                if($user->status=="blocked"){
                    Auth::logout();

            return response()->json(['message' => 'Your Account its bloacked please Contuct Us'], Response::HTTP_UNAUTHORIZED);

                }
                else{
                if($user->role =="admin")
                {
                    return response()->json(['message' => 'Login successful','url'=>'/dashborad'], Response::HTTP_OK);

                }
                else{
                    return response()->json(['message' => 'Login successful','url'=>$currentUrl], Response::HTTP_OK);

                }
        
            } 
        }
    
       else {
            return response()->json(['message' => 'Invalid password'], Response::HTTP_UNAUTHORIZED);
        }
    }
}
     
        
    

   public function logout() {
    Auth::logout();
    return redirect()->route('login');
}


    public function showRegistrationForm(){

        return view("auth.register");
    }

    public function register(Request $request) {
        $user = User::where("email", $request->email)->first();
        if ($user) {
            return response()->json(['errormessage' => 'User with this email already exists'], Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            User::create(['email' => $request->email, 'password' => Hash::make($request->password) ,'name'=>$request->name,'verification_token'=>$request->_token]);

            $user = User::where('email', $request->email)->first();
            if($user->is_verified==0){
                $verificationUrl ="http://127.0.0.1:8000/email-verified/".$user->verification_token;
    
                    Mail::to($user->email)->send(new WelcomeEmail($verificationUrl));
            
                    return response()->json(['message' => 'Please check Your email']);
            }

        }
    }
    
    public function RestPassword(){
        return view('auth.reset_password');

    }
    public function MailReset(Request $request){
        try {
            $user = User::where('email', $request->Email)->first();
            if (!$user) {
                return response()->json(['errormessage' => 'User not found'], Response::HTTP_NOT_FOUND);
            }
            $deleteuser=resetpasswordtoken::where('email', $request->Email)->delete();
            $token=$request->_token;

            $expirationTime = now()->addMinutes(10);
            $futureTimeFormatted = $expirationTime->format('Y-m-d H:i:s');

            $upadatedate=now();
           $resetpasswordtoken= resetpasswordtoken::create(['email' => $request->Email, 'updated_at'=>$upadatedate,'token'=>$token,'expire_to'=>$futureTimeFormatted ]);
         
            $userIdForResetPassword = "http://127.0.0.1:8000/reset-password/" . $user->id."/".$request->_token;
            $username=$user->name;
            Mail::to($user->email)->send(new passwordrest($username, $userIdForResetPassword));
            
            return response()->json(['message' => 'The email has been sent successfully.'], Response::HTTP_OK);
    
    }
         catch (\Exception $e) {
            return response()->json(['errormessage' => dd($e)], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function verifyEmail($token)
{
    // Find the user by the token and mark their email as verified
    $user = User::where('verification_token', $token)->first();

    if ($user) {
        $user->update([
            'verification_token' => null,
            'is_verified' => true,
        ]);

        return redirect('/login')->with('message', 'Your email has been verified successfully.');
    }

    return redirect('/login')->with('message', 'Email verification failed.');
}



public function thepageprice(){
    return view('thepageprice');
}

public function showpagenewpassword($id,$token){
    $user = User::where('id', $id)->first();
   $email= $user->email;
   $useremailcheck=resetpasswordtoken::where('email',$email)->first();
if ($useremailcheck) {

   $currentDateTime = now();
    $futureTimeFormatted = $currentDateTime->format('Y-m-d H:i:s');
   if(($futureTimeFormatted<=$useremailcheck->expire_to)&&($token==$useremailcheck->token)){
    return view('auth.newpasswordpage', compact('user'));
   }
}
   else{
    return redirect('login')->withErrors(['error' => 'Please Make Sure You Edit the password in 10 minutes']);
}
}


public function savenewpassword(Request $request, $id)
{
    $user = User::find($id);

    if (!$user) {
        return redirect()->route('login')->with('error', 'User not found.');
    }

    $request->validate([
        'password' => 'required|min:8',
    ]);
    

    $user->password = Hash::make($request->password);
    $user->save();
    $deleteuser=resetpasswordtoken::where('email', $user->email)->delete();
}
}
