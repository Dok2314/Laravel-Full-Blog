<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Comment;

class Article extends Model
{
    use SoftDeletes;

    protected $table = 'articles';

    protected $fillable = [
        'title',
        'image',
        'article',
        'category_id',
        'user_id',
        'likes_count'
    ];

    public function category()
    {
        return $this->belongsTo(CategoryArticle::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'articles_tags');
    }

    public function users(){
        return $this->belongsToMany(User::class, 'article_user_likes');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function commentsWithoutParent()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
}
