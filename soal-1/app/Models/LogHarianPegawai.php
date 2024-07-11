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
        'keterangan_log_harian', 
        'status_log_harian',
        'id_pegawai',
        'status',
        'created_at',
        'updated_at',
        'created_by', 
        'updated_by'
    ];

    public function master_pegawai()
    {
        return $this->hasOne(MasterPegawai::class, 'id', 'id_pegawai');
    }

}
