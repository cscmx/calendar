<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;


#[Fillable(['name', 'description', 'start_date_time', 'is_highlighted'])]

class Appointment extends Model
{
    public function member()
    {
        return $this->belongsTo(Member::class);
    }


}

