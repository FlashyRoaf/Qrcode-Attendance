<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Notice extends Model
{
    //
    use Notifiable;

    protected $primaryKey = 'id';
    protected $keyType= 'string';
    public $incrementing = false;

    protected $fillable = [
        'id', 'notice', 'noticedes', 'noticelink', 'telegramid',
    ];
}
