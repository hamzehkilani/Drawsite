<?php 
namespace App\Repository ;
use App\IRepository\Adminpagesinterface;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Discount;

class Adminpagesrepo implements Adminpagesinterface{

    
    public function index()
    {
       return view('admin.dashborad');
    }

    public function usersindex()
    {
       return view('admin.users');
    }
    public function Paintersindex()
    {
       return view('admin.Painters');
    }
    public function indexEvents()
    {
       return view('admin.events');
    }
    public function indexProducts()
    {
       return view('admin.products');
    }
    public function createProduct(Request $request)
    {
      
        try {
            $request->validate([
                'description' => 'required|string',
                'price' => 'required',
                'stock_quantity' => 'required',
                'name' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            $imageName = time() . '.' . $request->image->getClientOriginalName();

            // Assuming Livewire is handling file uploads
            $request->image->storeAs('assets/productsimg/', $imageName, 'Image');
    
            Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'stock_quantity' => $request->stock_quantity,
                'price' => $request->price,
                'image' => $imageName,
            ]);
    
            toastr()->success("Product Add Successfuly");
            return redirect()->back();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }







    public function createDiscount(Request $request)
    {
        try {
            $request->validate([
                'percentage' => 'required',
                'price_after_discount' => 'required',
                'expire_date' => 'required',
                'product_id' => 'required|unique:discounts,product_id',
            ]);

            Discount::create([
                'price_after_discount' => $request->price_after_discount,
                'percentage' => $request->percentage,
                'expire_date' => $request->expire_date,
                'product_id' => $request->product_id,
            ]);
        toastr()->success("Discount Add Successfuly");
            return redirect()->back();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}