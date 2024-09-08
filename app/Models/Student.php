<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'date_of_birth',
        'roll',
        'blood_group',
        'religion',
        'email',
        'class',
        'section',
        'admission_id',
        'phone_number',
        'address',
        'city',
        'state',
        'zip_code',
        'country',
        'parent_name',
        'prenom_parent',
        'profession_parent',
        'address_parent',
        'contact_parent',
        'country_parent',
        'previous_school_name',
        'previous_school_address',
        'last_class_attended',
        'birth_certificate', // For birth certificate image
        'school_report', // For school report image
        'registration_form', // For registration form image
        'upload',
    ];

    public function notes()
    {
        return $this->hasMany(Notes::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

   
}
