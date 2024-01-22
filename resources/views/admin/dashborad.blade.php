@extends('admin.layout')
@section('title','dashborad')
     @section('conetnt')
     <main>
        <div class="container-fluid px-4">
               
             <livewire:counts />

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        DataUser
                    </div>
                    <livewire:users-table />

                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        DataPainters
                    </div>
                    <livewire:painterstable />

                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        DataEvents
                    </div>
                    <livewire:events-table />

                </div> 
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    DataRequests
                </div>
                
                <livewire:requeststatusforadmin />
        
            </div>
        </div>
    </main>




     @endsection
   
       