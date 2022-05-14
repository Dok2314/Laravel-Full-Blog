<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    protected $fillable = [
        'title',
        'image',
        'article',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(CategoryArticle::class);
    }
}
