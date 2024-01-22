<div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="{{asset('../css/orders.css')}}">
@foreach ($orders as $order)
<div class="container padding-bottom-3x mb-5 mt-5">
    <div class="card mb-3">
      <div class="p-4 text-center text-white text-lg bg-dark rounded-top"><span class="text-uppercase">Tracking Order No - </span><span class="text-medium">{{$order->id}}</span></div>
      <div class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2 bg-secondary">
        <div class="w-100 text-center py-1 px-2"><span class="text-medium">Shipped Via:</span> Artlife Groub</div>
        <div class="w-100 text-center py-1 px-2">
            <span class="text-medium">Status:</span>
            {{ $order->is_paid == 1 ? "Completed" : "In Progress" }}
        </div>
        <div class="w-100 text-center py-1 px-2">
          <span class="text-medium">Expected Date:</span>
          {{ $order->arrival_date ? \Carbon\Carbon::parse($order->arrival_date)->format('Y-m-d') : '' }}
      </div>
      
            </div>
      <div class="card-body">
        <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
          <div class="step completed">
            <div class="step-icon-wrap">
              <div class="step-icon"><i class="pe-7s-cart"></i></div>
            </div>
            <h4 class="step-title">Confirmed Order</h4>
          </div>
          <div class="step completed">
            <div class="step-icon-wrap">
              <div class="step-icon"><i class="pe-7s-config"></i></div>
            </div>
            <h4 class="step-title">Processing Order</h4>
          </div>
          <div class="step completed">
            <div class="step-icon-wrap">
              <div class="step-icon"><i class="pe-7s-medal"></i></div>
            </div>
            <h4 class="step-title">Quality Check</h4>
          </div>
          <div class="step   {{ $order->is_paid == 1 ? "completed" : "" }}">
            <div class="step-icon-wrap">
              <div class="step-icon"><i class="pe-7s-car"></i></div>
            </div>
            <h4 class="step-title">Product Dispatched</h4>
          </div>
          <div class="step   {{ $order->is_paid == 1 ? "completed" : "" }}">
            <div class="step-icon-wrap">
              <div class="step-icon"><i class="pe-7s-home"></i></div>
            </div>
            <h4 class="step-title">Product Delivered</h4>
          </div>
        </div>
      </div>
    </div>
    <div class="d-flex flex-wrap flex-md-nowrap justify-content-center justify-content-sm-between align-items-center">
      <div class="custom-control custom-checkbox mr-3">
        <input class="custom-control-input" type="checkbox" id="notify_me" checked="">
        <label class="custom-control-label" for="notify_me">Notify me when order is delivered</label>
      </div>
      <div class="text-left text-sm-right"><a class="btn btn-outline-primary btn-rounded btn-sm" href="orderDetails/{{$order->id}}" data-toggle="modal" data-target="#orderDetails">View Order Details</a></div>
    </div>
  </div>
@endforeach
 
        </div>
