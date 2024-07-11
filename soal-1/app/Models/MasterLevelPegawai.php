<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLevelPegawai extends Model
{
    use HasFactory;

    protected $table = 'master_level_pegawai';
    protected $primaryKey = 'id';

    protected $fillable = [
        'kategori_level', 
        'status',
        'create_at',
        'update_at',
        'created_by', 
        'updated_by'
    ];

    public function master_pegawai()
    {
        return $this->hasMany(MasterPegawai::class, 'id_level_pegawai', 'id');
    }
}
