<?php

namespace App\Jobs;

use App\Models\Comment\Comment;
use App\Notifications\NewCommentNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Notifications\Notification;

class NewCommentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $comments;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Comment $comments)
    {
        //
        $this->comments =$comments;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $notification = new NewCommentNotification($this->comments);
        Notification::send($notification);
    }
}
