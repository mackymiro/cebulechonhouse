<?php

namespace App\Livewire;
use Hash;
use App\Models\User;

use Livewire\Component;

class AdminController extends Component
{
    public $email;
    public $password;

    public function loginForm(){
    
       $email = $this->email;
       $password = $this->password;
      
       $user = User::where('email', $email)->first();
       $passwordDB = $user->password;

       if(Hash::check($password, $passwordDB)){
           dd('Match', $passwordDB);
            //$this->redirect('/posts');
       }else{
            dd('not match', $passwordDB);
       }
       
    }
   
    public function render()
    {
        return view('livewire.admin-controller');
    }

  
}
