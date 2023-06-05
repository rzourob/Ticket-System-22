<?php

namespace App\Notifications;

use App\Models\Maintenance\MaintenanceRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewRequestItNotification extends Notification
{
    use Queueable;
    public $maintenancerequests;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(MaintenanceRequest $maintenancerequests)
    {
        //
        $this->maintenancerequests = $maintenancerequests;
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
            ->subject('New Ticket')
            ->from('info@ticket.it-rmb.com', config('app.name'))
            ->greeting('Hello:name', ['name' => $notifiable->name])
            ->line(':name has commenton your post ":name"', [
            'author_email'=>$this->maintenancerequests->author_email,
            'author_name'=>$this->maintenancerequests->author_name,
            'tiket_no'=>$this->maintenancerequests->tiket_no,
            ])
            ->action('View Cmment', url('/'), [
                $this->maintenancerequests->maintenancerequest_id
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
