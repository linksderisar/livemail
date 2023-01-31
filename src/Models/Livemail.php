<?php

namespace Linksderisar\Livemail\Models;

use Illuminate\Database\Eloquent\Model;

class Livemail extends Model
{
    protected $fillable = [
        'to', 'cc', 'bcc', 'subject', 'from_name', 'from_email', 'html',
    ];

    protected $casts = [
        'to' => 'json',
        'cc' => 'json',
        'bcc' => 'json',
        'read' => 'bool',
    ];
}
