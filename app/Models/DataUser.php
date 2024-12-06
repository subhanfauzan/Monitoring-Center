<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'saverity',
        'suspect_problem',
        'time_down',
        'waktu_saat_ini',
        'status_site',
        'tim_fop',
        'remark',
        'ticket_swfm',
        'nop',
        'cluster_to'
    ];

        public function scopeUniqueNops($query)
    {
        return $query->select('nop')->distinct();
    }
}
