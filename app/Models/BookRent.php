<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRent extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

}
