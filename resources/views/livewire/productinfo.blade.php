<div>
    <div class="container mt-5">
      <div class="d-flex productdiscountinfo" style="    align-items: center;
      ">
  
              <img src="{{asset('/assets/productsimg/'. $products->image)}}" class="img-fluid" alt="" style="width:300px" />
              <div class="p-4" style=" margin-top: 36px;">
                @if( number_format($averageRating, 1)>0)
                <div class="d-flex mb-3" style=" align-items: center;" >
                <i class="fa-solid fa-star fa-2xl" style="color: #faf200;"></i>{{ number_format($averageRating, 1) }}
              </div>
                @endif
                  <div class="mb-3">
                          <span class="badge bg-dark me-1">{{$products->name}}</span>
                          <span class="badge bg-info me-1">New</span>
                      @if($products->discounts)
                          <span class="badge bg-danger me-1">Bestseller</span>
                      @endif
                  </div>
  
                  <p class="lead">
                          @if($products->discounts)
                          <span class="me-1">
                          <s style="color: red">{{$products->price}}$</s>
                      </span>
                      <span>{{$products->discounts->price_after_discount}}$</span>
                      @else
                    
                      <span>{{$products->price}}$</span>
                          @endif
                   
                  </p>
            
  
                  <strong><p style="font-size: 20px;">Description</p></strong>
  
                  <p>{{$products->description}}</p>
                  @auth
                  @if(($issubscribe && $issubscribe->product_id==$products->id))
                  <div class="container d-flex ">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="stars">
                          @for ($i = 5; $i >= 1; $i--)
                          <input class="star star-{{ $i }}" id="star-{{ $i }}" type="radio" name="star" value="{{ $i }}" wire:click="ratevalues({{ $i }}, {{$products->id }})" {{ $userRating == $i ? 'checked' : '' }}/>
                          <label class="star star-{{ $i }}" for="star-{{ $i }}"></label>
                      @endfor
                    </div>
                      </div>
                    </div>
                    </div>
                  @endif
                  @endauth
               
                  
                <form class="d-flex justify-content-left" method="post" action="{{route('buy.products')}}" >
                  @csrf
                  <input hidden name="product_id" value="{{$products->id}}"/>
                  <input hidden name="acsses" value="forever"/>
                  <div  wire:poll.keep-alive.2s="getqunttinty">
                  @if($products->stock_quantity>0)
                  <div class="form-outline me-1" style="width: 100px;" >
                    <input type="number" name="quantity" value="1" class="form-control" max="{{$stockquentity}}" min="1" />
                </div>
                @else
                <strong>This Product Out Off Stock Pls Cheack in Another time</strong>
                @endif
                  </div>
                      @auth
                      <button class="btn btn-primary ms-1" type="submit">
                          Add To Cart
                          <i class="fas fa-shopping-cart ms-1"></i>
                      </button>
                  </form>
            
                      @endauth
                      @guest
                      <form class="d-flex justify-content-left" >
  
                      <a class="btn btn-primary ms-1" href="/login" type="button">
                        Add To Cart
                        <i class="fas fa-shopping-cart ms-1"></i>
                      </a>  
                    </form>
  
                      @endguest
                      
                 
                
              </div>
           
      </div>
  
      <hr />
      <div class="row d-flex justify-content-center">
          <div class="col-md-6 text-center">
              <h4 class="my-4 h4">More products Have Sales</h4>
  
              <p>In This Section will show You Most Pobuler products Have sales</p>
          </div>
      </div>
  
      <div class="row">
          @foreach ($productdiscounts as $productdiscount)
          @if($productdiscount->discounts)
          <div class="col-lg-3 col-md-6 mb-4">
              <div class="card" style="height: 561px;">
                <div class="bg-image hover-zoom ripple" data-mdb-ripple-color="light">
                  <img src="{{asset('/assets/productsimg/'. $productdiscount->image)}}"
                    class="w-100" />
                  <a href="/productinfo/{{$productdiscount->id}}">
                    <div class="mask" style="background: rgba(251, 251, 251, 0.15) !important;">
                      <div class="d-flex justify-content-start align-items-end h-100">
                        <h5><span class="badge sale-badge ms-2" style="background: red">{{$productdiscount->discounts->percentage}}%</span></h5>
                      </div>
                    </div>
                    <div class="hover-overlay">
                      <div class="mask" style="background: rgba(251, 251, 251, 0.15) !important;"></div>
                    </div>
                  </a>
                </div>
                <div class="card-body">
                  <a href="/productinfo/{{$productdiscount->id}}"class="text-reset">
                    <h5 class="card-title mb-2">{{$productdiscount->name}}</h5>
                  </a>
                  <a href="/productinfo/{{$productdiscount->id}}" class="text-reset ">
                      <p>{{ implode(' ', array_slice(str_word_count($productdiscount->description, 1), 0, 30)) }}</p>
                  </a>
                  <h6 class="mb-3 price">
                    <s style="color: red">{{$productdiscount->price}}$</s><strong class="ms-2 sale">{{$productdiscount->discounts->price_after_discount}}$</strong>
                  </h6>
                </div>
              </div>
            </div>
      
          @endif
          @endforeach
          
          </div>
      <!--Grid row-->
  </div>
  
      </div>
    