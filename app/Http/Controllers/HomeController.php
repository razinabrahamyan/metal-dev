<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Notification;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.home');
    }

    public function test(){
        dd(auth()->user()->leadRequests);
        $notification = new UserNotification([
            'data' => 'dsfsdf',
            'type' => 'dsfhgsd'
        ]);
        auth()->user()->notify($notification);
        dd(456);
        Notification::send(User::find(2),$notification);
        dd(123);

    }
}
