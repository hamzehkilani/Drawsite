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
                             <div class="absolute inset-y-0 left-0 flex items-center  pointer-events-none" style="padding-left:  9.25rem">
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
                             Create New Painter
                            </button>
                     
                     
                        @endif
                 </div>
              
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                @include('livewire.includes.events-table-sortable-th',[
                                    'name' => 'title',
                                    'displayName' => 'Title'
                                ])
                                @include('livewire.includes.events-table-sortable-th',[
                                    'name' => 'user_id',
                                'displayName' => 'Admin Name'
                            ])
                                @include('livewire.includes.events-table-sortable-th',[
                                    'name' => 'status',
                                'displayName' => 'Status'
                            ])
                         
                         @include('livewire.includes.events-table-sortable-th',[
                            'name' => 'location',
                                 'displayName' => 'Location'
                                ])
                                @include('livewire.includes.events-table-sortable-th',[
                                    'name' => 'created_at',
                                    'displayName' => 'Joined'
                                ])
                                <th scope="col" class="px-4 py-3">Last update</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                                <tr wire:key="{{ $event->id }}" class="border-b dark:border-gray-700">
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 ">
                                        {{ $event->title }}</th>
                                        <td class="px-4 py-3">{{ $event->creator->name }}</td>
                                    <td class="px-4 py-3">{{ $event->status }}</td>
                                    <td class="px-4 py-3">{{ $event->location }}</td>
                                    <td class="px-4 py-3">{{ $event->updated_at }}</td>
                                    <td class="px-4 py-3 flex items-center justify-end">
                                        <button
                                            onclick="confirm('Are you sure you want to delete {{ $event->title }} ?') || event.stopImmediatePropagation()"
                                            wire:click="delete({{ $event->id }})"
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
                            <select wire:model.live='perPageevent'
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
                    {{ $events->links() }}
                </div>
            </div>
        </div>
    </section>

          <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Create event</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
        </div>
        <div class="modal-body">
            <form wire:submit.prevent="createEvent">
                
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input wire:model="title" type="text" class="form-control" id="title" placeholder="Enter event title">
                </div>
        
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea wire:model="description" class="form-control" id="description" rows="3" placeholder="Enter event description"></textarea>
                </div>
        
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input wire:model="date" type="date" class="form-control" id="date">
                </div>
        
                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input wire:model="location" type="text" class="form-control" id="location" placeholder="Enter event location">
                </div>
        
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select wire:model="status" class="form-select" id="status">
                        <option value="active">Active</option>
                        <option value="unactive">Unactive</option>
                    </select>
                </div>
        
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input wire:model="image" type="file" class="form-control" id="image">
                </div>
        
                <button type="submit" class="btn createbtn">Create Event</button>
            </form>
        
            
        </div>
      
      </div>
    </div>
  </div>

</div>