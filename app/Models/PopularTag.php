<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PopularTag extends Model
{
    protected $fillable=['tag_id','popularity'];
    public $timestamps = false;
}
