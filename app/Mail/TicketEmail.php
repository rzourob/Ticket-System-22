<?php

namespace App\Mail;

use App\Models\Maintenance\MaintenanceRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketEmail extends Mailable
{
    use Queueable, SerializesModels;

    // private Maintenancerequest $maintenancerequest;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private MaintenanceRequest $maintenancerequests;

    public function __construct(MaintenanceRequest $maintenancerequests )
    {
        //
        $this->maintenancerequests = $maintenancerequests;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('MBR | Ticket | System')
        ->markdown('emails.Ticket')->with([

            'author_email'=>$this->maintenancerequests->author_email,
            'author_name'=>$this->maintenancerequests->author_name,
            'tiket_no'=>$this->maintenancerequests->tiket_no,
            
        ]);
        // return $this->markdown('emails.Ticket');
    }
}
