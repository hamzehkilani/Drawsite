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
                         <div class="relative w-full flex" style="    flex-direction: row-reverse;">
                             <div class="foricone" style="    margin-top: 8px;
                             text-align: center;
                             /* margin-right: 22px; */
                             margin-left: -27px">
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
                     
            
              
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 py-3">Request Id</th>
                                <th scope="col" class="px-4 py-3">status</th>
                                <th scope="col" class="px-4 py-3">Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reqeuestforusers as $reqeuestforuser)
                            <tr wire:key="{{ $reqeuestforuser->id }}" class="border-b dark:border-gray-700">
                                <th scope="row"
                                    class="px-4 py-3 font-medium text-gray-900 ">
                                    {{ $reqeuestforuser->id }}</th>
                                    <td class="px-4 py-3">{{ $reqeuestforuser->status}}</td>
                        
                                <td class="px-4 py-3 flex items-center ">
                                    <button 
                                    data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        wire:click="showeditmodel({{ $reqeuestforuser->id }})"
                                        class="px-3 py-1 bg-red-500 text-white rounded">Edit Stauts</button>
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
                    {{ $reqeuestforusers->links() }}
                </div>
            </div>
        </div>
    </section>
    @if($showmodelstutas==true)
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: contents;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Create Product</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="closemodel">x</button>
        </div>
        <div class="modal-body">
            <form   wire:submit.prevent="editrequeststatus({{$request_id}})">
                @csrf
                
                <div class="mb-3">
                    <label for="name" class="form-label">سجل الشركه</label>
                <img src="{{asset('assets/requestsimg/'. $registration_document??'')}}" alt="">
                </div>
        
                <div class="mb-3">
                    <label for="description" class="form-label">مخطط اراضي</label>
                    <img src="{{asset('assets/requestsimg/'. $Land_plan??'')}}" alt="">

                </div>
        
                <div class="mb-3">
                    <label for="price" class="form-label">مخطط موقع</label>
                    <img src="{{asset('assets/requestsimg/'. $Site_plan??"")}}" alt="">

                </div>
                <div class="mb-3">
                    <label for="stock_quantity" class="form-label">هوية مقدم الطلب</label>
                    <img src="{{asset('assets/requestsimg/'. $applicant_identity??"")}}" alt="">
                </div>
        
                <div class="mb-3">
                    <label for="image" class="form-label">اذن اشغال</label>
                    <img src="{{asset('assets/requestsimg/'. $temporary_pledge_form??"")}}" alt="">
                </div>
                
        
                <button type="submit" class="btn createbtn">الموافقه على الطلب</button>
            </form>
        
            
        </div>
      
      </div>
    </div>
  </div>
  @endif



</div>
