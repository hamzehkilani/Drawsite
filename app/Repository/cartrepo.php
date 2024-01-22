<?php 
namespace App\Repository;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use App\Models\userinfo;
use App\Models\orders;
use App\Models\order_product;
use Carbon\Carbon;
use App\IRepository\Cartinterfaec;

class Cartrepo implements Cartinterfaec{
    public function index()
    {

        return view('userspages.cartinfo');
    }
    public function checkOut()
    {

        $userinfo = User::where('id', auth()->user()->id)->with('userinfo')->first();
        $cartdata = Cart::where('user_id', auth()->user()->id)->with('discounts', 'product')->get();
        $Totals = 0;

        foreach ($cartdata as $data) {
            if ($data->discounts) {
                $price = $data->discounts->price_after_discount;
            } else {
                $price = $data->product->price;
            }

            $totalPriceForProduct = $price * $data->quantity;


            $Totals += $totalPriceForProduct;
        }

        $Totals += 5.99;

        return view('userspages.checkout', compact('userinfo', 'cartdata', 'Totals'));
    }

    public function create(Request $request)
    {
        try {
            $user_id = auth()->user()->id;

            $request->validate([
                'product_id' => 'required',
                'quantity' => 'required|numeric|min:1',
            ]);
            $product_exists = Cart::where([
                'product_id' => $request->product_id,
                'user_id' => auth()->user()->id
            ])->count();

            if ($product_exists) {
                toastr()->error('This Product Alardy add To Cart Check It ');
                return redirect()->back();
            }
            $product = Product::where('id', $request->product_id)->first();

            $product_quantity = $product->stock_quantity;

            if ($request->quantity > $product_quantity) {
                toastr()->error('Insufficient quantity in stock.');
                return redirect()->back();
            }

            $new_quantity = $product_quantity - $request->quantity;

            Cart::create([
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'user_id' => $user_id,
            ]);

            toastr()->success('Product added successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            toastr()->error('Error adding product to cart.');
            return redirect()->back();
        }
    }

    public function placeorder(request $request)
    {
        $valdate = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);
        $cheack = userinfo::where('user_id', auth()->user()->id)->count();
        if ($request->saveinfo && $cheack == 0) {
            $address2 = $request->address2;
            userinfo::create([
                'user_id' => auth()->user()->id,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'address' => $request->address,
                'phone' => $request->phone,
                'address2' => $request->address2,
            ]);
            $cartdata = Cart::where('user_id', auth()->user()->id)->with('discounts', 'product')->get();
            if (count($cartdata) > 0) {

                $currentDate = Carbon::now();

                $formattedDate = $currentDate->format('Y-m-d');
                $order = orders::create([
                    'user_id' => auth()->user()->id,
                    'total_amount' => $request->total,
                    'arrival_date' => $formattedDate,
                ]);

                foreach ($cartdata as $data) {
                    $orderquantity = $data->quantity;
                    $productdata = Product::where('id', $data->product_id)->first();
                    $stock_quantity = $productdata->stock_quantity;
                    if ($orderquantity >= $stock_quantity) {
                        toastr()->error('We dont Have this Quantity we have ' . $stock_quantity);
                        return redirect()->back();

                    } else {
                        $new_quantity = $stock_quantity - $orderquantity;
                        $productdata->update([
                            'stock_quantity' => $new_quantity,
                        ]);

                    }


                    $price = 0;
                    if ($data->discounts) {
                        $price = $data->discounts->price_after_discount;

                    } else {
                        $price = $data->product->price;
                    }
                    order_product::create([
                        'order_id' => $order->id,
                        'product_id' => $data->product_id,
                        'quantity' => $data->quantity,
                        'price' => $price,
                    ]);
                }
                Cart::where('user_id', auth()->user()->id)->with('discounts', 'product')->delete();

                toastr()->success('Order Placement Succsessfully ');
                return redirect()->back();



            } else {
                toastr()->error('Please Add Products ');
                return redirect()->back();
            }
        } else {

            $cartdata = Cart::where('user_id', auth()->user()->id)->with('discounts', 'product')->get();
            if (count($cartdata) > 0) {

                $currentDate = Carbon::now();

                $formattedDate = $currentDate->format('Y-m-d');
                $order = orders::create([
                    'user_id' => auth()->user()->id,
                    'total_amount' => $request->total,
                    'arrival_date' => $formattedDate,
                ]);

                foreach ($cartdata as $data) {

                    $orderquantity = $data->quantity;
                    $productdata = Product::where('id', $data->product_id)->first();
                    $stock_quantity = $productdata->stock_quantity;
                    if ($orderquantity > $stock_quantity) {
                        toastr()->error('We dont Have this Quantity we have ' . $stock_quantity);
                        return redirect()->back();

                    } else {
                        $new_quantity = $stock_quantity - $orderquantity;
                        $productdata->update([
                            'stock_quantity' => $new_quantity,
                        ]);

                    }

                    $price = 0;
                    if ($data->discounts) {
                        $price = $data->discounts->price_after_discount;

                    } else {
                        $price = $data->product->price;
                    }
                    order_product::create([
                        'order_id' => $order->id,
                        'product_id' => $data->product_id,
                        'quantity' => $data->quantity,
                        'price' => $price,
                    ]);
                }
                Cart::where('user_id', auth()->user()->id)->with('discounts', 'product')->delete();

                toastr()->success('Order Placement Succsessfully ');
                return redirect()->back();
            } else {
                toastr()->error('Please Add Products ');
                return redirect()->back();
            }


        }
    }
}