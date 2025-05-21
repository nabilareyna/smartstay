<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function loadRegisterForm(){
        return view("register");
    }

    public function registerUser(Request $request){
        // perform validation here
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'no_telepon' => 'required',
            'password' => 'required|min:6|max:8|confirmed',
        ]);



        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->no_telepon = $request->no_telepon;
            $user->password = Hash::make( $request->password );
            $user->save();

            // add user_id in user_profiles table
            // $user_profile = new UserProfile;
            // $user_profile->user_id = $user->id;
            // $user_profile->save();

            return redirect('/registration/form')->with('success','You Have been Registered Successfully!');
        } catch (\Exception $e) {
            return redirect('/registration/form')->with('error',$e->getMessage());

        }
    }

    public function loadLoginPage(){
        return view('login-page');
    }

    public function LoginUser(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6|max:8',
        ]);

        try {
            // login logic here
            $userCredentials = $request->only('email','password');

            if(Auth::attempt($userCredentials)){
                // redirect user to home page based on role
                // this allow us to use single login page to authenticate users with different roles..
                $user = auth()->user();
                $token = $user->createToken('auth_token')->plainTextToken;

                if($user->role == 0){ //here role is a column I added in users table
                    return redirect('/user/home');
                }elseif($user->role == 1){
                    return redirect('/admin/home');
                }else{
                    return redirect('/')->with('error','Error to find your role');
                }

            }else{
                return redirect('/login/form')->with('error','Wrong User Credentials');
            }
        } catch (\Exception $e) {
            return redirect('/login/form')->with('error',$e->getMessage());
        }
    }

    public function LogoutUser(Request $request){
        if ($request->user()) {
            // Hapus token jika menggunakan Sanctum API authentication
            $request->user()->tokens()->delete();
        }

        Auth::logout(); // Logout user dari session
        $request->session()->invalidate(); // Hapus semua session
        $request->session()->regenerateToken(); // Regenerasi CSRF token

        return redirect('/login/form')->with('message', 'Logout successful');
    }

    public function load404() {
        return view('404');
    }
}
