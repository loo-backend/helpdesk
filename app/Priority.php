<?php

namespace Helpdesk;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Priority extends Eloquent
{
    protected $fillable = [
     	'_id',
    	'name',
    	'active',
    ];

}
