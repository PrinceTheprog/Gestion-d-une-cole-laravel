<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'name', 'description', 'teacher_id', 'room_id', 
    ];

    public function notes()
    {
        return $this->hasMany(Notes::class);
    }

   

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'room_id');
    }

}
