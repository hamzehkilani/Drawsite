<div>

    <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="{{route('chat')}}" id="navbarDropdownMenuLink" role="button" aria-expanded="false">
        <i class="fa-brands fa-facebook-messenger" ></i>
        @if($messagecount>0)
         <span class="badge rounded-pill badge-notification bg-danger">{{$messagecount}}</span>
         @endif
      </a>
      <div wire:poll.keep-alive.2s="refreshMessages"></div>
</div>
