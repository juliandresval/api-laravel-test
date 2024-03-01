<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PasswordUpdatingNotification;

class PasswordUpdatingObserver
{
    /**
     * Handle the User "updatePassword" event.
     */
    public function updatePassword(User $user): void
    {
        Notification::send($user, new PasswordUpdatingNotification($user));
    }
}
