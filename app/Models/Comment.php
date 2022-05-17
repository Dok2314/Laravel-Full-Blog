<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'title',
        'slug',
        'comment',
        'article_id'
    ];

    public function setSlugAttribute($title)
    {
        $this->attributes['slug'] = str_slug($title, '-');
    }
}
