<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignupRequest;
use App\Models\User;
use Exception;
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
        try{
          $user= User::create($input);
        }catch(Exception $e){
            Log::error($e->getMessage());
            return redirect()->route('signup.create')->with('error', $e->getMessage());
        }

        Mail::to($input->user())->send(new SignupMail($input));
        return redirect()->route('login.index')->with('success', 'Signup Successfully');
    }

}
