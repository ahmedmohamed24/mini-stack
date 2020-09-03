<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable=['popularity','title'];
    public $timestamps=false;
}
