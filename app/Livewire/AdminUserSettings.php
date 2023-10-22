<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Hash;

class AdminUserSettings extends Component
{
    public $email;
    public $password;


    protected $rules = [
        'email'=>'required|unique:users',
        'password'=>'required',
    ];

    public function addAdmin(){
        $this->validate();
        $admin = 1;
        $email = $this->email;
        $hashPwd = Hash::make($this->password);
        User::create([
            'admin' => 1,
            'name' => 'admin',
            'email'=>$email,
            'password'=>$hashPwd
        ]);

        $this->email = '';
        $this->password = '';

        session()->flash('message', 'User successfully added!');

    }

    public function render(){
        $users = User::where('admin',1)->get();
        return view('livewire.admin-user-settings', ['users'=>$users]);
    }
}
