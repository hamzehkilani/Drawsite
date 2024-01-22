<div>
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
    <section class="mt-10 mb-10">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex items-center justify-between d p-4">
                    <div class="flex">
                        <div class="flex">
                         <div class="relative w-full">
                             <div class="absolute inset-y-0 left-0 flex items-center  pointer-Products-none" style="padding-left:  9.25rem">
                                 <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                     fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                     <path fill-rule="evenodd"
                                         d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                         clip-rule="evenodd" />
                                 </svg>
                             </div>
                             <input wire:model.live.debounce.300ms="search" type="text"
                                 class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                                 placeholder="Search" required="">
                         </div>
                         
                     </div>
                     @if($pageLoaded)
              
                     
                     @else
                         <button type="button" class="btn createbtn ml-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                             Create New Product
                            </button>
                     
                     
                        @endif
                 </div>
              
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                @include('livewire.includes.Products-table-sortable-th',[
                                    'name' => 'name',
                                    'displayName' => 'Name'
                                ])
                                @include('livewire.includes.Products-table-sortable-th',[
                                    'name' => 'description',
                                'displayName' => 'Description'
                            ])
                                @include('livewire.includes.Products-table-sortable-th',[
                                    'name' => 'price',
                                'displayName' => 'Price'
                            ])
                        <th scope="col" class="px-4 py-3">Image</th>
                         @include('livewire.includes.Products-table-sortable-th',[
                            'name' => 'stock_quantity',
                                 'displayName' => 'Stock Quantity'
                                ])
                                @include('livewire.includes.Products-table-sortable-th',[
                                    'name' => 'created_at',
                                    'displayName' => 'Joined'
                                ])
                                <th scope="col" class="px-4 py-3">Last update</th>
                                <th scope="col" class="px-4 py-3">Discont</th>
                                <th scope="col" class="px-4 py-3">stauts</th>
                                <th scope="col" class="px-4 py-3">Price After Discont</th>
                                <th scope="col" class="px-4 py-3">Expire Date</th>
                                <th scope="col" class="px-4 py-3">
                                  Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Products as $Product)
                                <tr wire:key="{{ $Product->id }}" class="border-b dark:border-gray-700">
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 ">
                                        {{ $Product->name }}</th>
                                        <td class="px-4 py-3">{{ $Product->description}}</td>
                                    <td class="px-4 py-3">{{ $Product->price }}
                                    <td class="px-4 py-3">
                                    @if($Product->image)
                                    <img src="{{ asset('assets/productsimg/'.$Product->image) }}" alt="Book Image" width="50" height="50">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td class="px-4 py-3">{{ $Product->created_at }}</td>

                                    <td class="px-4 py-3">{{ $Product->stock_quantity }}</td>
                                    <td class="px-4 py-3">{{ $Product->updated_at }}</td>
                                  
                                    <td class="px-4 py-3">    @if(isset($Product->discounts->price_after_discount))
                                        {{ $Product->discounts->price_after_discount}}
                                    @else
                                    <button  style="color: blue; cursor: pointer;" wire:click="showDiscount({{ $Product->id }})" >Add</button>
                                    @endif
                                </td ></td>
                                    <td class="px-4 py-3">{{ $Product->discounts->status ??"null" }}</td>
                                    <td class="px-4 py-3">{{ $Product->discounts->price_after_discount ??"null"}}</td>
                                    <td class="px-4 py-3">{{ $Product->discounts->expire_date ??"null" }}</td>
                                    <td class="px-4 py-3 flex items-center justify-end">
                                        <button
                                            onclick="confirm('Are you sure you want to delete {{ $Product->name }} ?') || Product.stopImmediatePropagation()"
                                            wire:click="delete({{ $Product->id }})"
                                            class="px-3 py-1 bg-red-500 text-white rounded">X</button>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="py-4 px-3">
                    <div class="flex ">
                        <div class="flex space-x-4 items-center mb-3">
                            <label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
                            <select wire:model.live='perPageProduct'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="3">3</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                    {{ $Products->links() }}
                </div>
            </div>
        </div>
    </section>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Create Product</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
        </div>
        <div class="modal-body">
            <form action="{{route('admin.create.product')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input  type="text" class="form-control" name="name" placeholder="Enter Product Name">
                </div>
        
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" rows="3" placeholder="Enter Product description"></textarea>
                </div>
        
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input  type="number" class="form-control" name="price" placeholder="Enter Product Price" step="0.01">
                </div>
                <div class="mb-3">
                    <label for="stock_quantity" class="form-label">Stock Quantity</label>
                    <input  type="number" class="form-control" name="stock_quantity" placeholder="Enter Product Stock Quantity">
                </div>
        
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input  type="file" class="form-control" name="image" >
                </div>
                
        
                <button type="submit" class="btn createbtn">Create Product</button>
            </form>
        
            
        </div>
      
      </div>
    </div>
  </div>

  @if($showUserModal)

  <div class="modal fade show" id="addDiscountModal" tabindex="-1" role="dialog" aria-labelledby="addDiscountModalLabel" aria-modal="true" style="display: block;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDiscountModalLabel">Add Discount</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeUserModal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('create.descount')}}" method="post">
                    @csrf
                    <input hidden type="number" name="product_id" class="form-control" value="{{$discountdata->id}}">
                      <div class="form-group">
                        <label for="packageName">Product Name</label>
                        <input readonly type="text" class="form-control" value="{{$discountdata->name}}">
                    </div>

                    <div class="form-group">
                        <label for="packagePrice">Product price</label>
                        <input readonly type="number" id="packagePrices" class="form-control" value="{{$discountdata->price}}" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="packagePrice">percentage %</label>
                        <input type="text" class="form-control"  name="percentage" id="packagePricePercentage" onchange="calculateFinalPrice()" required="">
                    </div>
                    <div class="form-group">
                        <label for="price_after_discount">Product price afte percentage </label>
                        <input type="number" class="form-control"   name="price_after_discount" id="packagePriceafte" step="0.01">
                    </div>

                    <div class="form-group">
                        <label for="expire">expire date </label>
                        <input type="date" class="form-control" id="expire"  name="expire_date">
                    </div>
                    <button type="submit" class="btn createbtn mt-3">Add Discount</button>
                </form>
            </div>

        </div>
    </div>
</div>

@endif


</div>

<script>



function calculateFinalPrice() {
     
    var percentageInput = document.getElementById('packagePricePercentage');
    var enteredPercentage = parseFloat(percentageInput.value);

    if (!isNaN(enteredPercentage)) {
        var basePrice = parseFloat(document.getElementById('packagePrices').value);
        var calculatedPrice = basePrice - (basePrice * enteredPercentage / 100);

        var packagePriceInput = document.getElementById('packagePriceafte');
        packagePriceInput.value = calculatedPrice.toFixed(2);
    } else {
        console.error('Invalid Percentage Value');
    }
}


</script>