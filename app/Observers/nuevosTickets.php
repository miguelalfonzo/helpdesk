<?php

namespace App\Observers;

use App\Events\newSupportRequest;
use App\Tickets;

class nuevosTickets
{
     public function created(Tickets $ticket)
    {
        // $ticket1 = $ticket->nroTicket;
        // event(new newSupportRequest($ticket));
    }
}
