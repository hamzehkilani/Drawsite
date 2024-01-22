<div>
    <link rel="stylesheet" href="{{asset('../css/orderdetail.css')}}">
    <div class="container-fluid">

        <div class="container">
          <!-- Title -->
          <div class="d-flex justify-content-between align-items-center py-3" style="justify-content: center;">
            <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Order #{{$orderId}}</h2>
          </div>
        
          <!-- Main content -->
          <div class="row" style="justify-content: center;">
            <div class="col-lg-8">
              <!-- Details -->
              <div class="card mb-4">
                <div class="card-body">
                  <div class="mb-3 d-flex justify-content-between">
                    <div>
                      <span class="me-3">Cash</span>
                      <span class="badge rounded-pill bg-info">SHIPPING</span>
                    </div>
                    <div class="d-flex">
                      <button class="btn btn-link p-0 me-3 d-none d-lg-block btn-icon-text"><i class="bi bi-download"></i> <span class="text">Invoice</span></button>
                      <div class="dropdown">
                        <button class="btn btn-link p-0 text-muted" type="button" data-bs-toggle="dropdown">
                          <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                          <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i> Edit</a></li>
                          <li><a class="dropdown-item" href="#"><i class="bi bi-printer"></i> Print</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <table class="table table-borderless">
                    <tbody>
                        @foreach ($order_info as $order)
                        <tr>
                            <td>
                              <div class="d-flex mb-2">
                                <div class="flex-shrink-0">
                                  <img src="{{asset('/assets/productsimg/'. $order->product->image)}}" alt="" width="35" class="img-fluid">
                                </div>
                                <div class="flex-lg-grow-1 ms-3">
                                  <h6 class="small mb-0"><a href="#" class="text-reset">{{$order->product->description}}</a></h6>
                                </div>
                              </div>
                            </td>
                            <td>{{$order->quantity}}</td>
                            <td class="text-end">{{$order->price}}</td>
                          </tr>

                        @endforeach
                     
                    
                    </tbody>
                    <tfoot>
                        <tr class="fw-bold">
                            <td colspan="2">Shopping</td>
                            <td class="text-end" style="text-wrap: nowrap;">$5.99</td>
                          </tr>

                      <tr class="fw-bold">
                        <td colspan="2">TOTAL</td>
                        <td class="text-end" style="text-wrap: nowrap;">{{$total}}</td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
              <!-- Payment -->
        
            </div>
       
          </div>
        </div>
          </div>
        </div>
