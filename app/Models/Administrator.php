<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    protected $fillable = ['user_id'];

    // Relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
