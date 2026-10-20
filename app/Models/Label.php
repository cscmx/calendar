<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use App\Models\Appointments;

#[Fillable(['name'])]
class Label extends Model
{
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

}
