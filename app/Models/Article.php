<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

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

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'articles_tags');
    }
}
