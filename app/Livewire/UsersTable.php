<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

class UsersTable extends Component
{
    use WithPagination;
    public $blockname;
    public $blockid;

    public $name;
    public $email;
    public $password;
    public $role;
   public $clickblock =false;


    #[Url(history:true)]
    public $search = '';

    #[Url(history:true)]
    public $admin = '';

    #[Url(history:true)]
    public $sortBy = 'created_at';

    #[Url(history:true)]
    public $sortDir = 'ASC'; // Set it to 'ASC' by default

    #[Url()]
    public $perPage = 5;
    
    protected $listeners = ['blockUser'];

    public $pageLoaded = false;

    public function mount()
    {
        $baseUrl = 'http://127.0.0.1:8000/dashborad';
        $currentUrl = url()->current();
        if( $currentUrl== $baseUrl)
            {
                $this->pageLoaded = true;
            }
    
    }

    public function showbloackmodel($id){
        $user=User::where('id',$id)->first();
        $this->blockname=$user->name;
        $this->blockid=$user->id;
        $this->clickblock=true;
    }
    public function closemodel(){
        $this->blockname='';
        $this->blockid='';
        $this->clickblock=false;
    }

    public function createUser()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => $this->role,
        ]);

        $this->reset(['name', 'email', 'password', 'role']);
        session()->flash('message', 'User Create successfully.');
    }

    

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function blockUser($userId)
    {
       
        $user = User::find($userId);

        if ($user) {
            $user->update([
                'status' => 'blocked',
            ]);
            session()->flash('message', 'User blocked successfully.');
            $this->blockname='';
            $this->blockid='';
            $this->clickblock=false;
        }
    }
    

   
    public function setSortBy($sortByField)
    {
        if ($this->sortBy === $sortByField) {
            $this->sortDir = ($this->sortDir == "ASC") ? 'DESC' : "ASC";
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDir = 'ASC'; 
            }

    public function render()
    {
     

        return view('livewire.users-table', [
            'users' => User::search($this->search)
                ->when($this->admin !== '', function ($query) {
                    $query->where('role', $this->admin);
                })
                ->orderBy($this->sortBy, $this->sortDir)
                ->paginate($this->perPage),
                 'pageLoaded' => $this->pageLoaded,
        ]);
    }
}
