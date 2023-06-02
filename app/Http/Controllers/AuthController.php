<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   public function index(){
        return view('index');
   }

   public function register(){
    return view('auth/register');
   }

   public function registerAuth(Request $request){

    $validator = Validator::make($request->all(),[
        'name' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'username' => 'required|string|max:255',
        'image' => 'nullable',
        'email'=>'required|string|email|max:255|unique:users',
        'password'=>'required|string|min:8'
    ]);

    if($validator->fails()){
        return back()->withErrors([
            'error_msg' => 'Error en la validación de datos. Intentelo nuevamente.'
        ]);
    }

   
    $user = User::create([
        'name'=> $request->name,
        'lastname' => $request->lastname,
        'username'=> $request->username,
        'image' => $request->image,
        'email'=> $request->email,
        'password'=> Hash::make($request->password)
    ]);

    Auth::login($user);

    return redirect('profile');

   }

   public function login(){
    return view('auth/login');
   }

   public function loginAuth(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('profile'));
        }   
        else{
            return back()->withErrors([
                'error_msg' => 'Email o contraseña incorrecta. Intente nuevamente.'
            ]);
        }     
   }
}
