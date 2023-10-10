<?php

namespace App\Livewire;
use Hash;
use App\Models\User;

use Livewire\Component;

class AdminController extends Component
{
    public $email;
    public $password;

    public function addCategories(){
        return view('livewire.add-categories');
    }

    public function loginForm(){
    
       $email = $this->email;
       $password = $this->password;
      
       $user = User::where('email', $email)->first();
       $passwordDB = $user->password;

     

       if(Hash::check($password, $passwordDB)){
            $this->redirect('/admin/dashboard');
       }else{
            //dd('not match', $passwordDB);
            session()->flash('message', 'Password is incorrect');
            $this->redirect('/admin');
       }
       
    }
   
    public function render()
    {
        return view('livewire.admin-controller');
    }

  
}
