@extends('layout')

@section('content')


      
<style>
  .custom-slider {
    display: flex;
    overflow: hidden;
    transition: transform 0.5s ease-in-out;
  }

  .card {
    flex: 0 0 33.33%; /* Adjusted to show 3 items per view */
    box-sizing: border-box;
    padding: 0 10px;
  }

  .prev-btn,
  .next-btn {
    cursor: pointer;
    padding: 10px;
    background-color: #333;
    color: #fff;
    border: none;
  }
  img.user-img {
    width: 40px;
    height: 40px;
    border-radius: 23px;
}
</style>
  <!--Main layout-->
  <main class="mt-5">
    <div class="container">
      <!--Section: Content-->
      <section>
        <div class="row">
          <div class="col-md-6 gx-5 mb-4">
            <div class="bg-image hover-overlay ripple shadow-2-strong" data-mdb-ripple-color="light">
              <img src="https://mdbootstrap.com/img/new/slides/031.jpg" class="img-fluid" />
              <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </a>
            </div>
          </div>

          <div class="col-md-6 gx-5 mb-4">
            <h4><strong>Facilis consequatur eligendi</strong></h4>
            <p class="text-muted">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis
              consequatur eligendi quisquam doloremque vero ex debitis
              veritatis placeat unde animi laborum sapiente illo possimus,
              commodi dignissimos obcaecati illum maiores corporis.
            </p>
            <p><strong>Doloremque vero ex debitis veritatis?</strong></p>
            <p class="text-muted">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod
              itaque voluptate nesciunt laborum incidunt. Officia, quam
              consectetur. Earum eligendi aliquam illum alias, unde optio
              accusantium soluta, iusto molestiae adipisci et?
            </p>
          </div>
        </div>
      </section>
      <!--Section: Content-->

      <hr class="my-5" />

      <!--Section: Content-->
      <section class="text-center">
        <h4 class="mb-5"><strong>Most Pobuler Posts</strong>
        
        </h4>
        
           <div id="fordata"></div>
      </section>

      <hr class="my-5" />
    
          
      <section class="text-center">
          <h4 class="mb-5 "><strong>Sales Products</strong></h4>

      
          <div class="row">
            @foreach ($products as $product)
            @if($product->discounts)
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="card" style="height: 561px;">
                <div class="bg-image hover-zoom ripple" data-mdb-ripple-color="light">
                  <img src="{{asset('/assets/productsimg/'. $product->image)}}"
                    class="w-100" />
                  <a href="/productinfo/{{$product->id}}">
                    <div class="mask" style="background: rgba(251, 251, 251, 0.15) !important;">
                      <div class="d-flex justify-content-start align-items-end h-100">
                        <h5><span class="badge sale-badge ms-2">{{$product->discounts->percentage}}%</span></h5>
                      </div>
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
                  <h6 class="mb-3 price">
                    <s>{{$product->price}}$</s><strong class="ms-2 sale">{{$product->discounts->price_after_discount}}$</strong>
                  </h6>
                </div>
              </div>
            </div>
      
            @endif
            @endforeach
          </div>
      
      </section>
        
  
    <hr class="my-5" />

    </div>

  </main>
  <!--Main layout-->

</body>
</html>
@endsection
@section('scripts')

<script>

  function getData() {
    $.ajax({
      url: '/get-most-pobuler-posts',
      method: 'GET',
      dataType: 'html', 
      success: function(data) {
        console.log(data);

        $('#fordata').html(data);
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  }

  $(document).ready(function() {
    getData();
  });
    function initCustomSlider() {
      var slider = $('.custom-slider');
      var itemsCount = $('.custom-slider .card').length;
      var currentItem = 0;
  
      $('.prev-btn').click(function() {
        if (currentItem > 0) {
          currentItem--;
        } else {
          currentItem = Math.floor(itemsCount / 3) - 1;
        }
        updateSlider();
      });
  
      $('.next-btn').click(function() {
        if (currentItem < Math.floor(itemsCount / 3) - 1) {
          currentItem++;
        } else {
          currentItem = 0;
        }
        updateSlider();
      });
  
      function updateSlider() {
        var cardWidth = $('.custom-slider .card').outerWidth();
        var transformValue = -currentItem * cardWidth * 3 + 'px'; 
        slider.css('transform', 'translateX(' + transformValue + ')');
      }
    }
  
    $(document).ready(function() {
      initCustomSlider();
    });


</script>

    
@endsection
