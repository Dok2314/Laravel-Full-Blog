<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $table  = 'posts';

    protected $fillable = [
        'title',
        'slug',
        'post',
    ];

    public function setSlugAttribute($title){
        $this->attributes['slug'] = str_slug($title , "-");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
