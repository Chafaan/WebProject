<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    protected $table = 'personnels';

    public function dep()
    {
        return $this->belongsTo(Dep::class, 'id_dep');
    }

    public function diplome()
    {
        return $this->belongsTo(Diplome::class, 'id_diplome');
    }

    public function specialite()
    {
        return $this->belongsTo(Specialite::class, 'id_specialite');
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'id_grade');
    }
    use HasFactory;
    protected $fillable = [
        'nom',
            'prenom',
            'nomComplet_arb',
            'ppr' ,
            'status' ,
            'profession',
            'sexe',
            'datenaisf',
            'email' ,
            'date_rec_estbm',
            'id_grade',
            'date_rec_minis' ,
            'id_dep' ,
            'id_diplome' ,
            'id_specialite',
    ];
}
