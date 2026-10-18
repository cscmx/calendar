<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use App\Models\Member;

#[Fillable(['title', 'description', 'start_date_time', 'is_highlighted', 'label_id'])]

class Appointment extends Model
{
    protected $casts = [
        'start_date_time' => 'datetime'
    ];

    public function members()
    {
        return $this->belongsToMany(Member::class);
    }

    public function label()
    {
        return $this->belongsTo(Label::class);
    }

}

