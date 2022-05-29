<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\CommentCollection;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'title',
        'slug',
        'comment',
        'article_id',
        'parent_id',
        'user_id'
    ];

    public function setSlugAttribute($title)
    {
        $this->attributes['slug'] = str_slug($title, '-');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function descendants()
    {
        return $this->hasMany(Comment::class,'parent_id');
    }
}
