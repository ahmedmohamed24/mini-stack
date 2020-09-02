<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    protected $fillable=['email','token'];
    public function setUpdatedAtAttribute($value): void
    {
        // to Disable updated_at
    }
}
