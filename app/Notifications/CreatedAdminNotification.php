<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreatedAdminNotification extends Notification implements ShouldQueue
{
    use Queueable;
public $admin;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($admin)
    {
        //
        $this->admin =$admin;
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
        $greeting = sprintf('Hello'. $notifiable->name);
        return (new MailMessage)
                ->subject('لقد تم أنشاء حسابكم على موقع RMB')
                ->from('info@ticket.it-rmb.com',config('app.name'))
                ->greeting($greeting)
                ->line(':أسم المستخدم'. $this->admin->name)
                ->line(':البريد الاكتروني'. $this->admin->email)
                ->action('View Cmment', url('/'))
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