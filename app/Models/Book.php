<?php

namespace App\Models;

use App\Models\BookRent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    

    public function BookRent(): HasMany
    {
        return $this->hasMany(BookRent::class);
    }
    
   
}
