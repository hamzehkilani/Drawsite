<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\reqeuestforuser;
use Livewire\Attributes\Url;
use App\Repository\Livewirenewrequestrepo; // Import the reposito
use App\Models\User;

use App\IRepository\Livewirenewrequestinnterface;

class Newrequest extends Component
{
    #[Url(history: true)]
    public $shownumber = 1;
    #[Url(history: true)]
    public $request_type;

    #[Url(history: true)]
    public $f_name;
    #[Url(history: true)]
    public $s_name;
    #[Url(history: true)]
    public $t_name;
    #[Url(history: true)]
    public $l_name;
    #[Url(history: true)]
    public $document_number;
    #[Url(history: true)]
    public $email;
    #[Url(history: true)]
    public $phone;
    #[Url(history: true)]
    public $auckland_type;
    #[Url(history: true)]
    public $request_value_1faz;
    #[Url(history: true)]
    public $request_value_3faz;
    #[Url(history: true)]
    public $faz1;
    #[Url(history: true)]
    
    public $faz3;
    #[Url(history: true)]
    public $imber_power3;
    #[Url(history: true)]
    public $imber_power1;
    #[Url(history: true)]

    public $governorate;
    #[Url(history: true)]

    public $placement;
    #[Url(history: true)]

    public $street_name;
    #[Url(history: true)]


    public $building_number;
    #[Url(history: true)]

    public $the_nearest_landmark_is_available;


    public $name;

    public $user_info;

    public function next($pagenumber)
    {

        if ($this->request_type == '') {

        } else {
            if ($pagenumber == 1) {
                $validatedData = $this->validate([
                    'request_type' => 'required',
                ]);
                $this->shownumber += 1;

            } elseif ($pagenumber == 2) {
                $validatedData = $this->validate([
                    'f_name' => 'required',
                    's_name' => 'required',
                    't_name' => 'required',
                    'l_name' => 'required',
                    'document_number' => 'required',
                    'email' => 'required',
                    'phone' => 'required',
                    'auckland_type' => 'required|not_in:0',
                ]);
                $this->shownumber += 1;

            } elseif ($pagenumber == 3) {
                $this->name = $this->f_name . $this->s_name . $this->t_name . $this->l_name;
                $request_exists=reqeuestforuser::where([
                    'user_id'=>auth()->user()->id,
                    'status'=>'0'])->delete();

                reqeuestforuser::create([
                    'name' => $this->name,
                    'document_number' => $this->document_number,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    'auckland_type' => $this->auckland_type,
                    'request_type' => $this->request_type,
                    'placement' => $this->placement,
                    'street_name' => $this->street_name,
                    'the_nearest_landmark_is_available' => $this->the_nearest_landmark_is_available,
                    'governorate' => $this->governorate,
                    '1faz' => $this->faz1,
                    '3faz' => $this->faz3,
                    'imber_power3' => $this->imber_power3,
                    'imber_power1' => $this->imber_power1,
                    'request_value_3faz' => $this->request_value_3faz,
                    'request_value_1faz' => $this->request_value_1faz,
                    'building_number'=>$this->building_number,
                    'user_id'=>auth()->user()->id,
                ]);
                $this->shownumber += 1;

            }

        }
    }
    public function prev()
    {
        $this->shownumber -= 1;

    }
    public function getUserdata()
    {
        $this->user_info = User::where('id', auth()->user()->id)->with('userinfo')->first();
        if ($this->user_info->userinfo) {
            $this->f_name = $this->user_info->userinfo->firstname;
            $this->l_name = $this->user_info->userinfo->lastname;
            $this->phone = $this->user_info->userinfo->phone;

        }
        $this->email = $this->user_info->email;

    }

    public function render()
    {
        // dd($this->request_type);
        $this->getUserdata();
        return view('livewire.newrequest');
    }
}
