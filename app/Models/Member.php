<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use App\Models\Appointments;


#[Fillable(['name', 'date_of_birth', 'category', 'color'])]

class Member extends Model
{
    protected $casts = [
        'date_of_birth' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function appointments()
    {
        return $this->belongsToMany(Appointment::class);
    }
}
