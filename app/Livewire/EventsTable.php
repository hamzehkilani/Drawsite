<?php



namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\event;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

use function Laravel\Prompts\error;

class EventsTable extends Component
{
    use WithPagination , WithFileUploads;
    public $title;
    public $description;
    public $date;
    public $location;
    public $status ="active";
    public $image;
    #[Url(history:true)]
    public $search = '';

    #[Url(history:true)]
    public $sortByevent = 'created_at';

    #[Url(history:true)]
    public $sortDirevent = 'DESC';

    #[Url()]
    public $perPageevent = 3;
    public $pageLoaded = false;
    public function createEvent()
    {
        try {
            $this->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'date' => 'required|date',
                'location' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            $user = Auth::user();
    
            $event = Event::create([
                'title' => $this->title,
                'description' => $this->description,
                'date' => $this->date,
                'location' => $this->location,
                'user_id' => $user->id,
                'status' => $this->status,
                'image' => $this->image ? $this->image->store('eventsimg', 'public') : null,
            ]);
    
            $this->reset(['title', 'description', 'date', 'location', 'status', 'image']);
    
            session()->flash('message', 'Event created successfully.');
        } catch (\Exception $e) {
            // Handle the exception, log it, or use dd() for debugging
            dd($e->getMessage());
        }
    }
    
    public function mount()
    {
        $baseUrl = 'http://127.0.0.1:8000/dashborad';
        $currentUrl = url()->current();
        if( $currentUrl== $baseUrl)
            {
                $this->pageLoaded = true;
            }
    
    }

    public function updatedSearch(){
        $this->resetPage();
    }

    public function delete(event $event){
        $event->delete();
    }

    public function setSortByevent($sortByField){

        if($this->sortByevent === $sortByField){
            $this->sortDirevent = ($this->sortDirevent == "ASC") ? 'DESC' : "ASC";
            return;
        }

        $this->sortByevent = $sortByField;
        $this->sortDirevent = 'DESC';
    }

    public function render()
    {
        return view('livewire.events-table',
        [
            'events' => event::search($this->search)->with('creator')
            ->orderBy($this->sortByevent,$this->sortDirevent)
            ->paginate($this->perPageevent)
        ]
        );
    }
}
