<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\CreateUserNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Support\Facades\Notification;

class CreatedUser implements ShouldQueue 
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;

    /**
     * Create a new job instance.
     *
     * @return void
    */

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */

    public function handle()
    {
       
        

        $notification = new CreateUserNotification($this->user);
        Notification::send($notification);

        // $user->notify(new CreateUserNotification($user));
        // Notification::send(new CreateUserNotification( $user));
        // $user = Auth::user();
    }
}
