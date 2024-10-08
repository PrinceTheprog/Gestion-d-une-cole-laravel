<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',
        'full_name',
        'gender',
        'date_of_birth',
        'mobile',
        'joining_date',
        'qualification',
        'experience',
        'username',
        'address',
        'city',
        'state',
        'zip_code',
        'country',
    ];

    public function cours()
    {
        return $this->hasMany(Cours::class);
    }

    // app/Models/Teacher.php

public function attendances()
{
    return $this->hasMany(Attendance::class);
}

}
