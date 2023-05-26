<?php

namespace App\Models;

use App\Models\Author;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // public function scopeFilter($query, array $filters) {
    //     if($filters['tag'] ?? false) {
    //         $query->where('tags', 'like', '%' . request('tag') . '%');
    //     }
    //     if($filters['search'] ?? false) {
    //         $query->where('title', 'like', '%' . request('search') . '%')
    //         -> orWhere('annotation', 'like', '%' . request('search') . '%');
    //     }
    // }
}
