@extends('layout')
@section('title','Cart')
@section('content')
<main class="mt-5 pt-4">
    <div class="container">
        <!-- Heading -->
        <h2 class="my-5 text-center">Checkout form</h2>
<form method="POST" action="{{route('placeorder')}}" >
    @csrf
        <!--Grid row-->
        <div class="row">
            <!--Grid column-->
            <div class="col-md-8 mb-4">
                <!--Card-->
                <div class="card p-4">
                    <!--Grid row-->
                    <div class="row mb-3">
                        <!--Grid column-->
                        <div class="col-md-6 mb-2">
                            <!--firstName-->
                            <div class="form-outline">
                                <input type="text" id="typeText" class="form-control" value="{{$userinfo->userinfo->firstname ?? ''}}" name="firstname" required/>
                                <label class="form-label" for="typeText">First name</label>
                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-6 mb-2">
                            <!--lastName-->
                            <div class="form-outline">
                                <input type="text" id="typeText" class="form-control" name="lastname"  value="{{$userinfo->userinfo->lastname ?? ''}}"required />
                                <label class="form-label" for="typeText">Last name</label>
                            </div>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->

                    <!--Username-->
                    <div class="input-group mb-4">
                        <span class="input-group-text">UserName</span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" value="{{$userinfo->name ?? ''}}" required  />
                    </div>

                    <!--email-->
                    <p class="mb-0">
                        Email 
                    </p>
                    <div class="form-outline mb-4">
                         <input type="email" class="form-control" placeholder="youremail@example.com" aria-label="youremail@example.com" aria-describedby="basic-addon1" value="{{$userinfo->email ?? ''}}"  required/>
                    </div>

                    <!--address-->
                    <p class="mb-0">
                        Address
                    </p>
                    <div class="form-outline mb-4">
                        <input type="text" class="form-control" placeholder="1234 Main St" aria-label="1234 Main St" aria-describedby="basic-addon1" name="address" value="{{$userinfo->userinfo->address ?? ''}}" required/>
                    </div>

                    <!--address-2-->
                    <p class="mb-0">
                        Address 2 (optional)
                    </p>
                    <div class="form-outline mb-4">
                        <input type="text" class="form-control" placeholder="Apartment or suite" aria-label="Apartment or suite" aria-describedby="basic-addon1" name="address2"  value="{{$userinfo->userinfo->address2 ?? ''}}" />
                    </div>

                    <p class="mb-0">
                     Phone Number              
                          </p>
                    <div class="form-outline mb-4">
                        <input type="text" class="form-control" placeholder="+962 788 888 888" aria-label="Apartment or suite" aria-describedby="basic-addon1"   name="phone" value="{{$userinfo->userinfo->phone ?? ''}}" required />
                    </div>

                    <hr />
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="saveaddress" id="saveAddressCheckbox" />
                        <label class="form-check-label" for="saveAddressCheckbox">Shipping address is the same as my billing address</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="false" name="saveinfo" id="saveInfoCheckbox" />
                        <label class="form-check-label" for="saveInfoCheckbox">Save this information for next time</label>
                    </div>
                    

                    <hr />

                    <div class="my-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked />
                            <label class="form-check-label" for="flexRadioDefault1"> Cash </label>
                        </div>
                    </div>
                    <hr class="mb-4" /> 

                    <input  hidden name="total" value="{{$Totals}}">
               

                  <button class="btn btn-primary" type="submit">Continue to checkout</button>
                </div>
                <!--/.Card-->
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-4 mb-4">
                <!-- Heading -->
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge rounded-pill badge-primary">{{count($cartdata)}}</span>
                </h4>

                <!-- Cart -->
                <ul class="list-group mb-3">
                    @foreach ($cartdata as $cart)
                    <li class="list-group-item d-flex justify-content-between">
                        <div>
                            <h6 class="my-0">{{$cart->product->name}}</h6>
                            <small class="text-muted">{{$cart->product->description}}</small>
                        </div>
                        <span class="text-muted">${{($cart->discounts->price_after_discount ?? $cart->product->price)*$cart->quantity}}</span>
                    </li>
                   
                    @endforeach
                 
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong>${{$Totals}}</strong>
                    </li>
                </ul>
      
            </div>
            <!--Grid column-->
        </div>
    </form>

        <!--Grid row-->
    </div>
</main>
@endsection

@section('scripts')
<script>
$(document).ready(function () {
    // Handle the "saveaddress" checkbox
    $('#saveAddressCheckbox').change(function () {
        if ($(this).prop('checked')) {
            // If checked, set the value to true
            $('#saveAddressCheckbox').val(true);
        } else {
            // If unchecked, set the value to an empty string or false, depending on your needs
            $('#saveAddressCheckbox').val('');
        }
    });

    // Handle the "saveinfo" checkbox
    $('#saveInfoCheckbox').change(function () {
        if ($(this).prop('checked')) {
            // If checked, set the value to true
            $('#saveInfoCheckbox').val(true);
        } else {
            // If unchecked, set the value to an empty string or false, depending on your needs
            $('#saveInfoCheckbox').val('');
        }
    });
});
</script>
@endsection
