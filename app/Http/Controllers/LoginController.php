<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        return view('login.index');
    }

    public function login(LoginRequest $request)
    {
        $input  = $request->all();
        $user = User::where('email',$input->email)->where('password',$input->password)->first();
        dd($user);
        if($user)
        {
            session()->put('id',$user->id);
        }
        else{
             return redirect()->back()->with('error', 'Email or Password is incorrect');
        }    }

    // public function __invoke(LoginRequest $request)
    // {
    //     $user = $request->User::where('email',$request->input('email'))->where('passwor',$request->input('password'))->first();
    //     dd($user);
    //     if($user)
    //     {
    //         session()->put('id',$user->id);
    //     }
    //     else{
    //          return redirect()->back()->with('error', 'Email or Password is incorrect');
    //     }
    // }
}
