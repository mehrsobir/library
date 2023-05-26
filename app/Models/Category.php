<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
