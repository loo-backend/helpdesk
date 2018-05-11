<?php

namespace Helpdesk;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class TicketReply extends Eloquent
{
    protected $table = 'replies';

    // protected $fillable = [
    //     'title',
    // ];
}
