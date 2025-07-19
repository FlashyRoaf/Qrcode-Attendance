<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    //
    protected $fillable = [
        "name", "waktu_scan", "status", "lokasi",
    ];
    
}
