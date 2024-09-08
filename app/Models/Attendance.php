<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';
    protected $fillable = [
        'user_id', 'date', 'status', 'reason',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // app/Models/Attendance.php

    public function users()
    {
        return $this->morphTo();
    }

}
