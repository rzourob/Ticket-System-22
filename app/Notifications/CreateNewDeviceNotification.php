<?php

namespace App\Notifications;

use App\Models\Device\Device;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreateNewDeviceNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $device;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($device)
    {
        //
        $this->$device =$device;
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
                ->line(':Device Name'. $this->device->name)
                ->line(': SN'. $this->device->sn)
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
