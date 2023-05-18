<?php

namespace App\Notifications;

use App\Models\Comment\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCommentNotification extends Notification
{
    use Queueable;

    protected $comments;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Comment $comments)
    {
        //
        $this->comments =$comments;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('new comment')
                    ->from('info@ticket.it-rmb.com',config('app.name'))
                    ->greeting('Hello:name',['name'=>$notifiable->name])
                    ->line(':name has commenton your post ":name"',[
                        'Created_by'=> $this->comments->Created_by,
                        'title'=> $this->comments->maintenancerequest->title,
                        ])
                    ->action('View Cmment', url('/'),[
                        $this->comments->maintenancerequest_id
                        ])
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
