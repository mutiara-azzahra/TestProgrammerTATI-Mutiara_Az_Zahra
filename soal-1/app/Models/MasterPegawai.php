<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPegawai extends Model
{
    use HasFactory;

    protected $table = 'master_pegawai';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_pegawai',
        'id_level_pegawai', 
        'id_atasan_pegawai',
        'id_user',
        'status',
        'create_at',
        'update_at',
        'created_by', 
        'updated_by'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }

    public function level_pegawai()
    {
        return $this->hasOne(MasterLevelPegawai::class, 'id', 'id_level_pegawai');
    }
}
