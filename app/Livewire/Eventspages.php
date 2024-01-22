<?php

namespace App\Livewire;

use App\Models\Event;
use Livewire\Component;
use \Carbon\Carbon;

class Eventspages extends Component
{
    public $events;
    public $firstday;
    public $secondday;

    public $Third;

    public $Fourth;
    public $dayforsearch;
    public $daynumber;

    public function changedate($day){
      if($day==1){
        $this->dayforsearch=$this->firstday;


      }
      else if($day==2){
        $this->dayforsearch=$this->secondday;

        
      }
      else if($day==3){
        $this->dayforsearch=$this->Third;

      }
      else if($day==4){
        $this->dayforsearch=$this->Fourth;

      }
      $this->daynumber=$day;
    }
    public function mount(){
        $this->dayforsearch=$this->firstday;
        $this->daynumber=1;

    }
    public function render()
    {
        $currentDate = Carbon::now();

        $formattedDate = $currentDate->format('Y-m-d');

        $this->firstday= $formattedDate;
        $this->secondday = Carbon::parse($this->firstday)->addDay()->format('Y-m-d');
        $this->Third = Carbon::parse($this->secondday)->addDay()->format('Y-m-d');
        $this->Fourth = Carbon::parse($this->Third)->addDay()->format('Y-m-d');
        $this->events = Event::where('status', 'active')
    ->whereDate('date', '=', $this->dayforsearch)
    ->get();

        return view('livewire.eventspages');
    }
}
