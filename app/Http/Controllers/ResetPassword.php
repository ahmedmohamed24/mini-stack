<?php

namespace App\Http\Controllers;

use App\User;
use App\Traits\AjaxResponse;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\ResetPassword as mailToReset;

class ResetPassword extends Controller
{
    use AjaxResponse;
    public function index(){
        return view('reset.getEmail');
    }
    public function sendResetMail(Request $request){
        //check if the email exists
        //send the token in mail message
        $validator=Validator::make(
            $request->only('email'),
            [
            'email'=>'required|email|exists:users,email'
        ]);
        if($validator->fails()) {
            return $this->response(false, $validator->messages(), null);
        }
        //send the email then return the response
        $temp=PasswordReset::where('email',$request->email)->get()->last();
        if($temp !== null){
            //not resetting password for the first time
            $t1=strtotime(date("Y-m-d H:i:s"));
            $t2=strtotime($temp->created_at);
            $delay=($t1-$t2)/60;//in minutes
            if($delay < 10){
                //after 10 minutes
                session()->flash('isNotWaited',true);
                return  $this->response(true,"Please visite your email or wait 10 minutes to resend",$delay);
            }
        }

        //generate random token
        try {
            $token = bin2hex(random_bytes(50));
        } catch (\Exception $e) {
            throw(new \Exception($e->getMessage(),$e->getCode()));
           // return $this->response(false,$e->getMessage(),$e->getCode());
        }
        PasswordReset::create([
            'email'=>$request->email,
            'token'=>$token,
            'created_at'=>now()
        ]);
        $data=[
            'email'=>$request->email,
            'token'=>$token
        ];
        Mail::to($request->email)->send(new mailToReset($data));
        return $this->response(true,"Please, check your account to reset your password",null);
    }
    public function reset($email,$token){
        $validator=Validator::make(
            [
                'email'=>$email,
                'token'=>$token
            ],
            [
                'email'=>'email',
                'token'=>'string'
            ]
        );
        if($validator->fails()){
            return abort(404,"This Token is not exist or expired");
            //return $this->response(false,'This Token is not exist or expired');
        }
        //check if there is an email with this token in the db (password_resets table)
        $result=PasswordReset::where('email',$email)->where('token',$token)->get()->last();
        if($result === null) {
            //no email with this token
            return abort(404, "This Token is not exist or expired");
        }
        //check the time of the token
        $t1=strtotime(date("Y-m-d H:i:s"));
        $t2=strtotime($result->created_at);
        $delay=($t1-$t2)/60;//in minutes
        if($delay < 10){
            session()->put('email',$email);
            return redirect()->route('pass.create');
        }
        return $delay;

        return abort(404,"This Token is not exist or expired");
    }


    public function createNewPassword(){
        if(session()->get('email') === null) {
            return abort(404, "This Token is not exist or expired");
        }
        return view('reset/create_new_password');

    }
    public function savePassword(Request $request){
        if(session()->get('email') === null) {
            return abort(404, "This Token is not exist or expired");
        }
        $request->validate([
            'password'=>  'min:6|string|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation'=> 'min:6',
        ]);
        User::where('email',session()->get('email'))->update([
            'password'=>Hash::make($request->password)
        ]);
        session()->flush();
        session()->flash('is_password_updated',true);
        return redirect()->route('login');
    }
}
