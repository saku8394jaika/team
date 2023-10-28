<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    use HasFactory;
    
    public function users()
    {
        return $this->belogstomany(user::class);
    }
    
    public function posts()
    {
        return $this->belongstomany(post::class);
    }
}
