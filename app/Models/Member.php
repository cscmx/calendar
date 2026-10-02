<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;


#[Fillable(['name', 'date_of_birth', 'category', 'color'])]

class Member extends Model
{
    //return the member of the user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
