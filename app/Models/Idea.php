<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Idea extends Model
{
    protected $with = ['user:id,name,image', 'comments.user:id,name,image'];
    protected $fillable = [
        'user_id',
        'content',
    ];

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function likes(){
        return $this->belongsToMany(User::class, 'idea_like')->withTimestamps();
    }

    use HasFactory;
}
