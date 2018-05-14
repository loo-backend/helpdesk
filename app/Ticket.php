<?php

namespace Helpdesk;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Ticket extends Eloquent
{

	use SoftDeletes;

    public $shelmaCollection = [
        'submitted_by',
        'credentials' => [
            'client_name',
            'client_url',
            'client_uuid',
            'client_staff_uuid',
        ],
        'subject',
        'description',
        'attachments' => [
            'attachment',
            'ext',
        ],
        'replies' => [
            'submitted_by',
            'credentials' => [
                'staff_uuid',
                'name',
                'email'
            ],
            'description',
            'attachments' => [
                'attachment',
                'ext',
            ],
            'ip'
        ],
        'departament_id',
        'priority_id',
        'status_id',
        'active',
        'read_support',
        'read_client',
        'ip',
        'answered_at',
    ];


    protected $fillable = [
        'submitted_by',
        'credentials',
        'subject',
        'description',
        'attachments',
        'replies',
        'departament_id',
        'priority_id',
        'status_id',
        'active',
        'read_support',
        'read_client',
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

    public function credentials()
    {
        return $this->embedsMany(CredentialsOpenTicket::class);
    }

    public function attachments()
    {
        return $this->embedsMany(Attachments::class);
    }

}
