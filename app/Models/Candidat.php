<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    protected $table = 'candidats';
    public function personnel()
    {
        return $this->belongsTo(Personnel::class, 'id_personnel');
    }
    public function instance()
    {
        return $this->belongsTo(Instance::class, 'id_instance');
    }
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'ppr',
        'grade',
        'date_rec_estbm',
        'date_rec_minis',
        'instance_id',
        'etat', 
    ];
}
