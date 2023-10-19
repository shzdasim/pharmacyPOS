<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserSearch extends Component
{
    public $search = '';
    public function render()
    {
       
        // Use dynamic query to filter users based on the search term
        $users = User::where('name', 'like', '%' . $this->search . '%')->get();

        return view('livewire.user-search', ['users' => $users]);
    }
}
