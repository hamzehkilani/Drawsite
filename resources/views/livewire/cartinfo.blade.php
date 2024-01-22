<div>
 <style>
  button.btn.btn-primary.px-3.ms-2 {
    height: fit-content;
    margin-top: 32px;
    height: fit-content;
    border-radius: 57px;
}
button.btn.btn-primary.px-3.me-2 {
  height: fit-content;
  margin-top: 32px;
    height: fit-content;
    border-radius: 57px;
}
.col-lg-4.col-md-6.mb-4.mb-lg-0 {
  display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    justify-content: center;
}
 </style>
    <section class="h-100 gradient-custom">
        <div class="container py-5">
          <div class="row d-flex justify-content-center my-4">
            <div class="col-md-8">
              <div class="card mb-4">
                <div class="card-header py-3">
                  <h5 class="mb-0">Cart - {{count($cartdata)}} items</h5>
                </div>
                <div class="card-body">
                
                  @foreach ($cartdata as $cartitem)
        <!-- Single item -->
        <div class="row">
            <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
              <!-- Image -->
              <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                <img src="{{asset('assets/productsimg/'.$cartitem->product->image)}}"
                  class="w-100" alt="Blue Jeans Jacket" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                </a>
              </div>
              <!-- Image -->
            </div>

            <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
              <!-- Data -->
              <p><strong>{{$cartitem->product->name}}</strong></p>
              @if($cartitem->discounts)
              <p id="product_price{{$cartitem->product->id}}" data-price="{{$cartitem->product->price}}">
                Price: {{$cartitem->product->price}}$
            </p>
              Price After Discount: <p id='product_price_discount{{$cartitem->product->id}}' data-discount-price="{{$cartitem->discounts->price_after_discount}}">{{$cartitem->discounts->price_after_discount}}$</p>
              @else
              <p id="product_price{{$cartitem->product->id}}" data-price="{{$cartitem->product->price}}">
                Price: {{$cartitem->product->price}}$
            </p>
              @endif
              <button type="button" class="btn btn-danger btn-sm me-1 mb-2" data-mdb-toggle="tooltip"  onclick="confirm('Are you sure you want to delete} ?') || cartitem.stopImmediatePropagation()"
                wire:click="delete({{ $cartitem->id }})"
                title="Remove item">
                <i class="fas fa-trash"></i>
              </button>
           
              <!-- Data -->
            </div>

            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
              <!-- Quantity -->
              <div class="d-flex mb-4" style="max-width: 300px">
                <button class="btn btn-primary px-3 me-2"
                onclick="faminus({{$cartitem->product->id}})" wire:click="minus({{$cartitem->product_id}})"  >
                  <i class="fas fa-minus"></i>
                </button>

                <div class="form-groub">
                  <label class="form-label" >Quantity</label>

                  <input  min="0" name="quantity"  type="number" class="form-control" id="quantitys_{{$cartitem->product->id}}"  
                    value="{{$cartitem->quantity}}" max="{{$cartitem->product->stock_quantity}}" min="1"/>
                </div>

                <button class="btn btn-primary px-3 ms-2"
                onclick="updateprice({{$cartitem->product->id}})" wire:click="plus({{$cartitem->product_id}})">
                <i class="fas fa-plus"></i>
             </button>
             
              </div>
              <!-- Quantity -->

              <!-- Price -->
              <p class="text-start text-md-center">
                <strong class="ttprice" id="price{{$cartitem->product->id}}">$
                    @if($cartitem->discounts)
            {{$cartitem->discounts->price_after_discount * $cartitem->quantity}}              
                @else
                {{$cartitem->product->price * $cartitem->quantity}}              

            @endif</strong>
              </p>
              <!-- Price -->
            </div>
          </div>
          <!-- Single item -->

          <hr class="my-4" />
                  @endforeach
                  <!-- Single item -->
                </div>
              </div>
           
          
            </div>
            <div class="col-md-4">
              <div class="card mb-4">
                <div class="card-header py-3">
                  <h5 class="mb-0">Summary</h5>
                </div>
                <div class="card-body">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                        Products
                        <span class="product-price">{{$Totals}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        Shipping
                        <span class="product-price">$5.99</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                        <div>
                            <strong>Total amount</strong>
                            <strong>
                                <p class="mb-0">(including VAT)</p>
                            </strong>
                        </div>
                        <span ><strong>{{$total}}</strong></span>
                    </li>
                </ul>
                @if(isset($cartitem))
                <input  hidden type="number" id="stock_quntity{{$cartitem->product->id}}" value="{{$cartitem->product->stock_quantity}}" >
                @else
                @endif

                  <a href="/Cheakout" class="btn btn-primary btn-lg btn-block">
                    Go to checkout
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    </div>   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function updateprice(id) {
        console.log('uare here');
        var product_id = id;
        var stock_quntity= $("#stock_quntity"+id);
        console.log(product_id);

        var quantity = $("#quantitys_"+ id).val();
        quantity++;
        $("#quantitys_"+ id).val(quantity);
        console.log(quantity);

        var price = $("#product_price_discount" + id).data("discount-price");

        if (price === undefined) {
        price = $("#product_price" + id).data("price");
    }
        console.log(price);

        var priceaftermuliple = quantity * price;

        console.log(priceaftermuliple);


        $("#price" + id).text("$ "+priceaftermuliple);
   

    }


    function faminus(id) {
        console.log('uare here');
        var product_id = id;
        console.log(product_id);

        var quantity = $("#quantitys_"+ id).val();
        quantity--;
        $("#quantitys_"+ id).val(quantity);
        console.log(quantity);

        var price = $("#product_price_discount" + id).data("discount-price");

        if (price === undefined) {
        price = $("#product_price" + id).data("price");
    }
        console.log(price);

        var priceaftermuliple = price * quantity;

        console.log(priceaftermuliple);


        $("#price" + id).text("$ "+priceaftermuliple);
    }



</script>
