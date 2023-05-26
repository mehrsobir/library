<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Book;
use App\Models\BookRent;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;


class BookRentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // get all articles
    public function index() {
        Paginator::useBootstrap();
        return view('book_rent.index', [
            'book_rents' => BookRent::latest()->paginate(10)
        ]);
    }
    
    public function create(Request $request) {
        return view('book_rent.create', [
            'students' => Student::all()->sortBy('name'),
            'books' => Book::all()->sortBy('title'),
        ]);
    }

    public function edit(BookRent $book_rent, Request $request) {
        return view('book_rent.edit', [
            'book_rent' => $request->book_rent,
            'students' => Student::all()->sortBy('name'),
            'books' => Book::all()->sortBy('title'),
        ]);
    }

    public function store(Request $request) {
        // dd(request()->all());
        $formFields = $request->validate([
            'student_id' => 'required',
            'book_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        BookRent::create($formFields);

        return redirect('/book_rents')->with('message', 'Success!!'); 
    }  

    public function update(Request $request, BookRent $book_rent) {
        
        $formFields = $request->validate([
            'student_id' => 'required',
            'book_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $book_rent->update($formFields);

        return redirect('/book_rents')->with('message', 'Done!!'); 
    }  

    public function destroy(BookRent $book_rent) {
        $book_rent->delete();
        return redirect('/book_rents')->with('message', 'Deleted!!');
    }
}

