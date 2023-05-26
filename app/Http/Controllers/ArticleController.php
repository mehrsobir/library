<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ArticleController extends Controller
{
    // get all articles
    public function index(Request $request) {
        Paginator::useBootstrap();
        if ($request->category) {
            $articles = Article::latest()->where('lang', app()->getLocale())->where('category_id', $request->category)->paginate(20);
        }else{
            $articles = Article::latest()->where('lang', app()->getLocale())->paginate(20);
        };
        return view('article.index', [
            'articles' => $articles,
            'types' => Type::all(),
            'cats' => Category::all(),
            'selected' => $request->category
            // 'articles' => Article::latest()->get()    gets latest
            // 'articles' => Article::latest()-> filter(request(['tag'])) ->get()    gets latest
            // 'articles' => Article::latest()-> filter(request(['tag'])) ->paginate(10) 
        ]);
    }

    public function search(Request $request) {
        Paginator::useBootstrap();
        $search = $request->search;
        if ($search) {
            $articles = Article::where('lang', app()->getLocale())
            ->where(function($query)  use ($search){
                $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('annotation', 'like', '%' . $search . '%')
                ->orWhere('keywords', 'like', '%' . $search . '%');
            })->paginate(20);
        }else{
            $articles = Article::latest()->where('lang', app()->getLocale())->paginate(20);
        };
        return view('article.index', [
            'articles' => $articles,
            'types' => Type::all(),
            'cats' => Category::all(),
        ]);
    }

    // get single article 
    public function show(Request $request) {
        $article = Article::where('slug', $request->article)->first();
        return view('article.show', [
            'article' => $article,
            'types' => Type::all(),

        ]);
    }

    public function export(Request $request) {
        $file = Article::where('slug', $request->article)->first();

        return response()->file(
            storage_path('app/public/' . $file->pdf)
        );
    
    }

}
