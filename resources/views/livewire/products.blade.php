<div>
  <main>
    <div class="container">
      <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark mt-3 mb-5 shadow p-2 headerbtn" >
      <!-- Container wrapper -->
      <div class="container-fluid">
    
        <!-- Navbar brand -->
        <a class="navbar-brand" href="#">Categories</a>
    
        <!-- Toggle button -->
        <button 
           class="navbar-toggler" 
           type="button" 
           data-mdb-toggle="collapse" 
           data-mdb-target="#navbarSupportedContent2" 
           aria-controls="navbarSupportedContent2" 
           aria-expanded="false" 
           aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
    
        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent2">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    
            <!-- Link -->
            <li class="nav-item acitve">
              <a class="nav-link text-white"  href="#"  wire:click="allsearch" vlaue=''>All</a>
            </li>
            <li class="nav-item">
                  <a class="nav-link text-white"   href="#" wire:click="searchvalue">Colors</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="#" wire:click="showsalesonly">Sales</a>
                </li>
          </ul>
    
          <!-- Search -->
          <form class="w-auto py-1" style="max-width: 12rem">
            <input type="search" class="form-control rounded-0" placeholder="Search" aria-label="Search" wire:model.live.debounce.300ms="search" >
          </form>
    
        </div>
      </div>
      <!-- Container wrapper -->
    </nav>
    @if($show==true)
    <section>
        <div class="row">
          @foreach ($Products as $product)
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="card" style="height: 561px;">
              <div class="bg-image hover-zoom ripple" data-mdb-ripple-color="light">
                <img src="{{asset('/assets/Productsimg/'. $product->image)}}"
                  class="w-100" />
                <a href="/productinfo/{{$product->id}}">

                  <div class="mask" style="background: rgba(251, 251, 251, 0.15) !important;">
                    @if($product->discounts)
                    <div class="d-flex justify-content-start align-items-end h-100">
                      <h5><span class="badge sale-badge ms-2">{{$product->discounts->percentage ??''}}%</span></h5>
                    </div>
                    @endif
                  </div>
                  <div class="hover-overlay">
                    <div class="mask" style="background: rgba(251, 251, 251, 0.15) !important;"></div>
                  </div>
                </a>
              </div>
              <div class="card-body">
                <a href="/productinfo/{{$product->id}}"class="text-reset">
                  <h5 class="card-title mb-2">{{$product->name}}</h5>
                </a>
                <a href="/productinfo/{{$product->id}}" class="text-reset ">
                  <p>{{ implode(' ', array_slice(str_word_count($product->description, 1), 0, 30)) }}</p>

                </a>
                @if($product->discounts)

                <h6 class="mb-3 price">
                  <s>{{$product->price}}$</s><strong class="ms-2 sale">{{$product->discounts->price_after_discount??''}}$</strong>
                </h6>
                @else 
                <h6 class="mb-3 price">
                 <strong class="ms-2 sale">{{$product->price}}$</strong>
                </h6>
                @endif
              </div>
            </div>
          </div>
          @endforeach
        </div>
    
    </section>

    @else

    <section>
      <div class="row">
        @foreach ($Products as $product)
        @if($product->discounts)
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card" style="height: 561px;">
            <div class="bg-image hover-zoom ripple" data-mdb-ripple-color="light">
              <img src="{{asset('/assets/Productsimg/'. $product->image)}}"
                class="w-100" />
              <a href="/productinfo/{{$product->id}}">

                <div class="mask" style="background: rgba(251, 251, 251, 0.15) !important;">
                  @if($product->discounts)
                  <div class="d-flex justify-content-start align-items-end h-100">
                    <h5><span class="badge sale-badge ms-2">{{$product->discounts->percentage ??''}}%</span></h5>
                  </div>
                  @endif
                </div>
                <div class="hover-overlay">
                  <div class="mask" style="background: rgba(251, 251, 251, 0.15) !important;"></div>
                </div>
              </a>
            </div>
            <div class="card-body">
              <a href="/productinfo/{{$product->id}}"class="text-reset">
                <h5 class="card-title mb-2">{{$product->name}}</h5>
              </a>
              <a href="/productinfo/{{$product->id}}" class="text-reset ">
                <p>{{ implode(' ', array_slice(str_word_count($product->description, 1), 0, 30)) }}</p>

              </a>
              @if($product->discounts)

              <h6 class="mb-3 price">
                <s>{{$product->price}}$</s><strong class="ms-2 sale">{{$product->discounts->price_after_discount??''}}$</strong>
              </h6>
              @else 
              <h6 class="mb-3 price">
               <strong class="ms-2 sale">{{$product->price}}$</strong>
              </h6>
              @endif
            </div>
          </div>
        </div>
        @endif
        @endforeach
      </div>
  
  </section>
@endif




  <!-- Pagination -->
<nav aria-label="Page navigation example" class="d-flex justify-content-center mt-3">
  <ul class="pagination">
      @if ($Products->onFirstPage())
          <li class="page-item disabled">
              <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
              </a>
          </li>
      @else
          <li class="page-item">
              <a class="page-link" wire:click="previousPage" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
              </a>
          </li>
      @endif

      @foreach ($Products->links() as $page => $url)
          <li class="page-item {{ $page == $Products->currentPage() ? 'active' : '' }}">
              <a class="page-link" wire:click="gotoPage('{{ $page }}')">{{ $page }}</a>
          </li>
      @endforeach

      @if ($Products->hasMorePages())
          <li class="page-item">
              <a class="page-link" wire:click="nextPage" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
              </a>
          </li>
      @else
          <li class="page-item disabled">
              <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
              </a>
          </li>
      @endif
  </ul>
</nav>
<!-- Pagination -->

    </div>
    </main>
</div>
