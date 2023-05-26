<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // get all books
    public function index() {
        Paginator::useBootstrap();
        return view('book.index', [
            'books' => Book::latest()->paginate(20)
        ]);
    }
    
    public function create(Request $request) {
        return view('book.create', [
            
        ]);
    }

    public function edit(Book $book, Request $request) {
        return view('book.edit', [
            'book' => $request->book
        ]);
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'pages' => 'required',
            'pub_year' => 'required'
        ]);

        
        Book::create($formFields);

        return redirect('/books')->with('message', 'Success!!'); 
    }  

    public function update(Request $request, Book $book) {
        
        $formFields = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'pages' => 'required',
            'pub_year' => 'required'
        ]);

        $book->update($formFields);

        return redirect('/books')->with('message', 'Done!!'); 
    }  

    public function destroy(Book $book) {
        $book->delete();
        return redirect('/books')->with('message', 'Deleted!!');
    }
}
