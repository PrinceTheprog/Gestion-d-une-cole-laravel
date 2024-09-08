<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;
    protected $fillable = [
        'classes_id',
        'cours_id',
        'teacher_id',
        'year_id',
        'period_id',
        'schedule'
    ];
 
   // Define the relationship with the Student model
   public function student()
   {
       return $this->belongsTo(Student::class, 'student_id');
   }

   // Define the relationship with the Course model
   public function cours()
   {
       return $this->belongsTo(Cours::class, 'cours_id');
   }

   // Define the relationship with the Student model
   public function classe()
   {
       return $this->belongsTo(Classe::class, 'classes_id');
   }

   // Define the relationship with the Course model
   public function teacher()
   {
       return $this->belongsTo(Teacher::class, 'teacher_id');
   }
   // Define the relationship with the Student model
   public function period()
   {
       return $this->belongsTo(Period::class, 'period_id');
   }

   // Define the relationship with the Course model
   public function year()
   {
       return $this->belongsTo(Year::class, 'year_id');
   }
}
