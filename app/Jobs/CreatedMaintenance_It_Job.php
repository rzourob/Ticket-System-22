<?php

namespace App\Jobs;

use App\Mail\TicketEmail;
use App\Models\Maintenance\MaintenanceRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class CreatedMaintenance_It_Job implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private MaintenanceRequest $maintenancerequests;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($maintenancerequests)
    {
        //
        $this->maintenancerequests = $maintenancerequests;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        Mail::to($this->maintenancerequests->author_email)->send(new TicketEmail($$this->maintenancerequests));
    }
}
