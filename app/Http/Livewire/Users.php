<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Users extends Component
{
    // public $name;
    // public $email;
    
    public $user;
    public $password;

    protected $listeners = [
        'edit'
    ];

    protected function rules()
    {
        return [
            'user.name' => 'required',
            'user.email' => 'required|email|unique:users,email,' . $this->user->id,
            'password' => 'required',
        ];
    }

    protected $messages = [
        'user.name.required' => 'Il campo nome non puo essere vuoto.',
    ];

    public function mount()
    {
        $this->newUser();
    }

    public function store()
    {
        /* User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]); */

        $this->validate();
        
        $this->user->password = $this->password;

        $this->user->save();

        session()->flash('success', 'Utente salvato correttamente.');

        $this->newUser();

        $this->emitTo('users-list', 'loadUsers');

    }

    public function newUser()
    {
        $this->user = new User;

        $this->password = '';
    }

    public function edit($user_id)
    {
        $this->user = User::find($user_id);

        $this->password = '';
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.users');
    }
}
