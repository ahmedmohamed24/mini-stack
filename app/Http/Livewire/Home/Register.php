<?php

namespace App\Http\Livewire\Home;

use App\Models\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class Register extends Component
{
    use WithFileUploads;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $specialization;
    public $img;

    public function submit()
    {

        $this->validate([
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|email|max:100|unique:users,email',
            'password'=>  'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation'=> 'min:6',
            'specialization'=> 'nullable|string',
            'img' => 'nullable|image|mimes:jpg,png,jpeg'
        ]);

        //Add this new user into database
        $newImageName=null;
        if($this->img !== null){
             //upload the image to DB
            $img=Image::make($this->img);
            $img->resize(400,null, static function($ratio){
                $ratio->aspectRatio();
            });
            $ext = '.' . explode("/", $img->mime())[1];
            $newImageName="user-".date("Ymd")."-".uniqid('', true).".$ext";
            $img->save(public_path("uploads/users/$newImageName"));
        }
        //Save in DBIntervention\Image\Facades\
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password'=>  Hash::make($this->password),
            'specialization'=> $this->specialization,
            'img' => $newImageName
        ]);
        setcookie('email', $this->email, time() + 10080*4, "/"); // this cookie will be available for only one month
        //create user token, may be user with mobile
        //

        //login and redirect to home page
        Auth::attempt(['email' => $this->email, 'password' => $this->password]);
        return redirect()->route('home.page');
    }
    public function render()
    {
        return view('visitor.register');
    }
}
