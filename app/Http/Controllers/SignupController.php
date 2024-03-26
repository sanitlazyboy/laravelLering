<?php

namespace App\Http\Controllers;
use App\Notifications\WelcomemailNotification;
use App\Mail\SignupMail;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Exception;
use Hash;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SignupController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('signup.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SignupRequest $request)
    {
        $input  = $request->all();
        $input['password']=Hash::make($input['password']);
        try{
          $user= User::create($input);
        }catch(Exception $e){
            Log::error($e->getMessage());
            return redirect()->route('signup.create')->with('error', $e->getMessage());
        }
        $user->notify(new WelcomemailNotification());
        // Mail::to($user->email)->send(new SignupMail($user->email));
        return redirect()->route('login.index')->with('success', 'Signup Successfully');
    }

}
