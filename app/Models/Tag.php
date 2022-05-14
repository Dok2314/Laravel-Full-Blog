<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;

    protected $table = 'tags';

    protected $fillable = [
        'title',
        'slug',
        'description'
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public function setSlugAttribute($title)
    {
        $this->attributes['slug'] = str_slug($title, '-');
    }
}
