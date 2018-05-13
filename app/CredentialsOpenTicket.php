<?php

namespace Helpdesk;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class CredentialsOpenTicket extends Eloquent
{
    protected $table = 'credentials';

    protected $fillable = [
        'credentials'
    ];

}
