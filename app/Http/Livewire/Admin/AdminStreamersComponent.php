<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminStreamersComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        $users = User::orderBy('pseudo', 'ASC')->paginate(5);

        return view('livewire.admin.admin-streamers-component',[
            'users' => $users,
        ]);
    }
}
