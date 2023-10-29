<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'post_id',
        'comment',
        ];
    
    public function user()
    {
        return $this->belongsToMany(User::class);
    }
    public function post()
    {
        return $this->belongsToMany(Post::class);
    }
    
}
