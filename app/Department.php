<?php

namespace Helpdesk;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Department extends Eloquent
{
     protected $fillable = [
     	'_id',
    	'name',
    	'email',
    	'active',
    ];
}
