<?php

namespace Helpdesk;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Ticket extends Eloquent
{
    protected $fillable = [
    	'uuid',
    	'subject',
  		'description',
    	'active',
    ];
}
