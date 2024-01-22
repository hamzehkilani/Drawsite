<?php 
namespace App\Repository;
use App\IRepository\UserspagesInterface;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\reqeuestforuser;
use App\Models\userinfo;
use Illuminate\Support\Facades\Storage;
use App\Events\MyEvent;

class Userspagesrepo implements UserspagesInterface{


    public function index()
    {
        event(new MyEvent('hello world'));

        $products = Product::take(5)->with('discounts')->get();
        return view("index",compact('products'));

    }

    


    public function editProfile($id)
    {

        $user=User::where('id',$id)->with('userinfo')->first();

        return view('userspages.editprofile',compact('user'));
    }
    public function orders()
    {

        return view('userspages.order');
    }

    public function events()
    {

        return view('userspages.events');
    }
    public function orderDetails($id)
    {
        $OrderID=$id;
        return view('userspages.orderDetails',compact('OrderID'));
    }
    public function indexProduct($id)
    {
       $Product_id =$id;
        return view('userspages.product', compact('Product_id'));
    }
    public function indexShop()
    {
        return view('userspages.shop');
    }

    public function updateUser(Request $request, $userId)
    {
        $user = User::findOrFail($userId);

        // Validate request data
        $request->validate([
            'name' => 'required|string|max:255',
            'firstname' => 'nullable|string|max:255',
            'lastname' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'address2' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update user details
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        // Update user info
        $userInfo = $user->userinfo ?? new UserInfo();
        $userInfo->update([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'address2' => $request->input('address2'),
        ]);
        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('userimg');
            $userInfo->update(['userimg' => $imagePath]);
        }

        // Redirect or return a response as needed
        return redirect()->back();
    }
    public function newRequest()
    {
      return view('userspages.sendnewrequest');
    }

    public function UpdateRequest(request $request)
    {

        $validatedData=$request->validate([
            'fileuploadfield_1'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'fileuploadfield_2'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'fileuploadfield_3'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'fileuploadfield_4'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'fileuploadfield_5'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'fileuploadfield_6'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'fileuploadfield_7'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // $images = array();
        // foreach($request->fileuploadfield_1 as $file){
        //     $originalName = time() . '.' .$file->getClientOriginalName();
        //     $file->storeAs('assets/requestsimg/', $originalName,'Image');
        //     $images[] = $originalName;
        // }
        for ($i = 1; $i <= 7; $i++) {
            if ($request->hasFile('fileuploadfield_' . $i)) {
                $file = $request->file('fileuploadfield_' . $i);
            $originalName = time() . '.' .$file->getClientOriginalName();
            $file->storeAs('assets/requestsimg/', $originalName,'Image');
            }
        }

            $user = reqeuestforuser::where(['user_id'=> auth()->user()->id,
            'status'=>'0'])->first();

        $user->update([
            'registration_document' => time() . '.' . $request->file('fileuploadfield_1')->getClientOriginalName(),
            'Land_plan' => time() . '.' . $request->file('fileuploadfield_2')->getClientOriginalName(),
            'Site_plan' => time() . '.' . $request->file('fileuploadfield_3')->getClientOriginalName(),
            'applicant_identity' => time() . '.' . $request->file('fileuploadfield_4')->getClientOriginalName(),
            'temporary_pledge_form' => time() . '.' . $request->file('fileuploadfield_5')->getClientOriginalName(),
        ]);
        session()->flash('form_submitted', 1);
        return redirect()->route('user.newrequest');
    }
    public function clearFormSubmittedSession()
{
    session()->forget('form_submitted');
}

}