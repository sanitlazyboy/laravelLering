<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\PushNotification;
use Illuminate\Support\Facades\Notification;

class PushNotificationController extends Controller
{
    public function index()
    {
        $user = User::find(2);
        // dd('0sdfsdfs',$user );
        $notification['test'] ="test the notification send mail";
        try{
            $user->notify(new PushNotification($notification));
            dd('done');
        }catch(Exception $e){
            dd($e);
        }
        // Notification::send($user, new PushNotification($notification));

    }
}
