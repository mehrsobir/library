<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Post;
use App\Models\Article;
use App\Models\Position;
use App\Models\Education;
use App\Models\Institution;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

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


    public function education()
    {
        return $this->belongsTo(Education::class, 'education_id');
    }
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }
    public function institution()
    {
        return $this->belongsTo(Institution::class, 'institution_id');
    }
    
}
