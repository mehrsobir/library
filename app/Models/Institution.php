<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function authors(): HasMany
    {
        return $this->hasMany(Author::class);
    }
}
