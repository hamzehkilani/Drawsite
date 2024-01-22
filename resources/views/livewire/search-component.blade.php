<div style="text-align: center;
display: flex;">
        <input type="text" wire:model.live.debounce.0.2s="searchTerm"  class="form-control me-2 " placeholder="Search for frind" aria-label="Search">
    
          
      @if($click==true)
      <ul class="dropdown-menu  show" aria-labelledby="navbarDropdownMenuLink"  style="margin-left: 150px;" data-popper-placement="bottom-end" data-mdb-popper="null">
        @foreach ($users as $user)
        <li>
          <a class="dropdown-item" href="/usersprofile/{{$user->id}}/0">{{$user->name}}</a>
        </li>
        @endforeach
       
       
      </ul>
      @endif
</div>


