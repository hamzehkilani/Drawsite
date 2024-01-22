@extends('admin.layout')
@section('title','dashborad')
     @section('conetnt')
     <div class="card mb-4">
          <div class="card-header">
              <i class="fas fa-table me-1"></i>
              DataPainters
          </div>
          <livewire:painterstable />

      </div>


     @endsection
   
       