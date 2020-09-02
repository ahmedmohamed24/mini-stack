<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavedQuestion extends Model
{
    protected $fillable=['user_id','question_id'];
}
