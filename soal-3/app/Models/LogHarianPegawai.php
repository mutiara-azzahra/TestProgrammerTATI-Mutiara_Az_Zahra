<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogHarianPegawai extends Model
{
    use HasFactory;

    protected $table = 'log_harian_pegawai';
    protected $primaryKey = 'id';

    protected $fillable = [
        'code', 
        'name',
        'google_place_id',
        'created_at',
        'updated_at',
        'created_by', 
        'updated_by'
    ];

}
