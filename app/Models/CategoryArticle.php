<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryArticle extends Model
{
    protected $table = 'articles_categories';

    protected $fillable = [
      'title',
      'slug',
      'description'
    ];

    public function setSlugAttribute($title)
    {
        $this->attributes['slug'] = str_slug($title, '-');
    }

    public function articles()
    {
        return $this->hasMany(Article::class,'category_id');
    }
}
