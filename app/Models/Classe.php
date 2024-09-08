<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nom_classe',
    ];
    public function classe()
    {
        return $this->hasMany(Classe::class);
    }
    public function classes()
    {
        return $this->belongsTo(Classe::class);
    }
}
