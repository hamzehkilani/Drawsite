<?php



namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\reqeuestforuser;
use Livewire\WithFileUploads;
use Livewire\Attributes\Url;

class Requeststatusforadmin extends Component
{
    use WithPagination , WithFileUploads;
   
public $status=false;
#[Url(history:true)]

public $search='';

public $perPageProduct=10;
public $registration_document;
public $Land_plan;
public $Site_plan;
public $applicant_identity;
public $temporary_pledge_form;
public $request_id;

public $showmodelstutas=false;

 public function closemodel(){
    $this->showmodelstutas=false;

 }
 public function showeditmodel($id){

    $imagewantshow=reqeuestforuser::where('id',"=",$id)->first();
    $this->registration_document=$imagewantshow->registration_document;
    $this->Land_plan=$imagewantshow->Land_plan;
    $this->Site_plan=$imagewantshow->Site_plan;
    $this->applicant_identity=$imagewantshow->applicant_identity;
    $this->temporary_pledge_form=$imagewantshow->temporary_pledge_form;
    $this->request_id=$imagewantshow->id;

    $this->showmodelstutas=true;


 }
 public function editrequeststatus($id)
 {
     $request_data = reqeuestforuser::find($id);
 
     // Check if the record exists
     if ($request_data) {
         $request_data->update(['status' => '1']);
 
         session()->flash('message', 'Change Successfully');
     } else {
         session()->flash('error', 'Record not found');
     }
 
     $this->showmodelstutas = false;
 }
 
 public function searchmethod()
 {
     if ($this->search == 0 ||$this->search=='') {
         return ['id', '>=', 0];
     } else {
         return ['id', '=', $this->search];
     }
 }
 
 public function render()
 {
     return view('livewire.requeststatusforadmin', [
         'reqeuestforusers' => reqeuestforuser::where(...$this->searchmethod())
             ->where('status', '0')
             ->orderBy('created_at', 'desc')
             ->paginate($this->perPageProduct)
     ]);
 }
 
}

