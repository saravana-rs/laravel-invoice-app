<?php

namespace App\Listeners;

use App\Events\InvoiceCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceMail;

class SendInvoiceEmail implements ShouldQueue
{
    public function handle(InvoiceCreated $event)
    {
        Mail::to($event->invoice->email)->send(new InvoiceMail($event->invoice));
    }
}
