<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Type;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class BookController extends Controller
{
    public function index(Request $request) {
        Paginator::useBootstrap();
        if ($request->category) {
            $books = Book::latest()->where('lang', app()->getLocale())->where('category_id', $request->category)->paginate(10);
        }else{
            $books = Book::latest()->where('lang', app()->getLocale())->paginate(10);
        };
        return view('book.index', [
            'books' => $books,
            'types' => Type::all(),
            'cats' => Category::all(),
            'selected' => $request->category
        ]);
    }

    public function search(Request $request) {
        Paginator::useBootstrap();
        $search = $request->search;
        if ($search) {
            $books = Book::where('lang', app()->getLocale())
                ->where(function($query)  use ($search){
                    $query->where('title', 'like', '%' . $search . '%')->orWhere('annotation', 'like', '%' . $search . '%');
                })->paginate(10);
        }else{
            $books = Book::latest()->where('lang', app()->getLocale())->paginate(10);
        };
        return view('book.index', [
            'books' => $books,
            'types' => Type::all(),
            'cats' => Category::all(),
        ]);
    }
    
    public function show(Request $request) {
        return view('book.show', [
            'book' => Book::where('slug', $request->book)->first(),
            'types' => Type::all(),

        ]);
    }

    public function export(Request $request) {
        $file = Book::where('slug', $request->book)->first();

        return response()->file(
            storage_path('app/public/' . $file->pdf)
        );
    
    }
}
