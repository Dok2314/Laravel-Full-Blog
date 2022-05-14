<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

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
