<?php

namespace Helpdesk;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Ticket extends Eloquent
{

	use SoftDeletes;

    protected $fillable = [
        'credentials_open_ticket_client',
        'subject',
        'description',
        'replies',
        'departament_id',
        'priority_id',
        'status_id',
        'attachments',
        'active',
        'read_departament',
        'read_staff',
        'last_action',
        'ip',
        'answered_at',
    ];

    protected $dates = ['deleted_at'];

    public function scopeWhereFullText($query, $search)
    {

        $query->getQuery()->projections = [
            'score' => [ '$meta'=>'textScore' ]
        ];

        return $query->whereRaw([
            '$text' => [ '$search' => $search ]
        ]);

    }

    public function replies()
    {
        return $this->embedsMany(TicketReply::class);
    }

}
