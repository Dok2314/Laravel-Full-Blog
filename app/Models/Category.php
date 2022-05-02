<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'title',
        'slug',
        'description'
    ];

    public function setSlugAttribute($title){
        $this->attributes['slug'] = str_slug($title , "-");
    }
}
