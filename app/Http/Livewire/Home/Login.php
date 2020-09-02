<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email,$password,$remember;
    public $showError=false;
    public function login(){
        $this->showError=false;
        $this->validate([
            'email'=>'required|email|max:100',
            'password'=>'required|min:6'

        ]);
        $this->remember = ($this->remember) ? true : false;
        $isLogged=Auth::attempt(['email' => $this->email, 'password' => $this->password],$this->remember);
        if(!$isLogged){
            $this->showError=true;
        }else{
            if($this->remember){
                setcookie('email', $this->email, time() + 10080*4, "/"); // this cookie will be available for only one month
            }
            return redirect(route('home.page'));
        }

    }
    public function mount(){
        if(isset($_COOKIE['email'])) {
            $this->email = $_COOKIE['email'];
        }
        return view('visitor.login');
    }
    public function render()
    {

        return view('visitor.login');
    }
}
