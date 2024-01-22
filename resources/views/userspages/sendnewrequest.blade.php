@extends('layout')
@section('title','New Request')
@section('content')
@if(session('form_submitted') == 1)
<div class="modal" tabindex="-1" id="showmodelrequest" style="display: contents;"> 
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Success!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closemodelrequest()"></button>
        </div>
        <div class="modal-body" style="    display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;">
            <img src="{{asset('../img/logo.png')}}" style="width: 300px;
            border-radius: 25px;" alt="logo">
          <p>Your form has been submitted successfully!</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closemodelrequest()">Close</button>
        </div>
      </div>
    </div>
  </div>
  @section('scripts')
<script>
    function closemodelrequest(){
        console.log("u are here");
$("#showmodelrequest").hide();
fetch('/clear-form-submitted-session', {
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        });
    }
    
</script>

@endsection
@endif

<livewire:newrequest />


@endsection
