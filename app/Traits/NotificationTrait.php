<?php


namespace App\Traits;


use App\Notifications\UserNotification;
use App\Models\User;
use Illuminate\Support\Facades\Notification;

trait NotificationTrait
{
    public function storeNotification($data,$user_id){
        $notification = new UserNotification($data);
        Notification::send(User::find($user_id),$notification);
        return;
    }
}
