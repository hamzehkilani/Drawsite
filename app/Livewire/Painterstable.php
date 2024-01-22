<?php



namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Painter;
use App\Models\user;
use Illuminate\Support\Facades\Hash;


class Painterstable extends Component
{
    use WithPagination;

    public $blockname;
    public $blockid;

    public $name;
    public $email;
    public $password;
    public $role="Painters";

    #[Url(history:true)]
    public $search = '';

    #[Url(history:true)]
    public $sortByPainter = 'created_at';

    #[Url(history:true)]
    public $sortDirPainter = 'DESC';

    #[Url()]
    public $perPagePainter = 3;


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
    public function createUser()
    {        

        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => $this->role,
        ]);
            $user=User::where('email',$this->email)->first();
            $user_id=$user->id;
        Painter::create([
            'name' => $this->name,
            'email' => $this->email,
            'user_id'=>$user_id,
        ]);

        $this->reset(['name', 'email', 'password', 'role']);
        session()->flash('message', 'User Create successfully.');
    }
    public function updatedSearch(){
        $this->resetPage();
    }

    public function delete($userId){
        $Painters=Painter::where('user_id',$userId);
        $Painters->delete();
        $user=User::where('id',$userId);
        $user->delete();
        session()->flash('message', 'Painters Deleted successfully.');


    }

    public function setSortByPainter($sortByField){

        if($this->sortByPainter === $sortByField){
            $this->sortDirPainter = ($this->sortDirPainter == "ASC") ? 'DESC' : "ASC";
            return;
        }

        $this->sortByPainter = $sortByField;
        $this->sortDirPainter = 'DESC';
    }

    public function render()
    {
        return view('livewire.painterstable',
        [
            'users' => Painter::search($this->search)
            ->orderBy($this->sortByPainter,$this->sortDirPainter)
            ->paginate($this->perPagePainter)
        ]
        );
    }
}
