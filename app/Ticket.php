<?php

namespace Helpdesk;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Ticket extends Eloquent
{

	use SoftDeletes;

    protected $fillable = [
    	'uuid',
    	'subject',
  		'description',
    	'active',
    ];

    protected $dates = ['deleted_at'];

    public function scopeWhereFullText($query, $search)
    {

        $query->getQuery()->projections = ['score'=>['$meta'=>'textScore']];

        return $query->whereRaw(array('$text' => array('$search' => $search)));
    }
}
