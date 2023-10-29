<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'image',
        'user_id'
    ];

    public function getPaginateByLimit(int $limit_count = 5)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function like()
    {
        return $this->belongsToMany(User::class,'likes');
    }
    
    public function comments()
    {
        return $this->hasmany(Comment::class);
    }
    
    public function isLikedBy($user)
    {
        return Like::where('user_id', $user->id)->where('post_id', $this->id)->first() !== null;
    }
    
    public function likeCount()
    {
        return Like::where('post_id', $this->id)->count();
    }
}
