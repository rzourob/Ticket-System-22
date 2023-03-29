<?php

namespace App\Mail;

use App\Models\Device\Device;
use App\Models\Maintenance\MaintenanceRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DeviceEmail extends Mailable
{
    use Queueable, SerializesModels;

    // private Maintenancerequest $maintenancerequest;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private Device $devices;

    public function __construct(Device $devices )
    {
        //
        $this->devices = $devices;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('MBR | Ticket | System')
        ->markdown('emails.DeviceCreate')->with([

            'deviceTypes'=>$this->device->title,
            'sn'=>$this->device->sn,
            'title'=>$this->device->title,
            
        ]);
        // return $this->markdown('emails.Ticket');
    }
}
