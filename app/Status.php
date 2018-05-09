<?php

namespace Helpdesk;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Status extends Eloquent
{

	protected $table = 'status';

    protected $fillable = [
     	'_id',
    	'name',
    	'active',
    ];
}
