<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Post;
use App\Models\Type;
use App\Models\Author;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
     // get all articles
     public function index() {
        return view('author.index', [
            'authors' => Author::latest()->paginate(10),
            'types' => Type::all(),
        ]);
    }

    public function show(Request $request) {
        if($request->type){
            if($request->type === '91'){
                if (app()->getLocale() === 'tg') {
                    $req_type = 'КИТОБ';
                }elseif(app()->getLocale() === 'ru'){
                    $req_type = 'КНИГА';
                }elseif(app()->getLocale() === 'en'){
                    $req_type = 'BOOK';
                };
                $type_id = 91;
                $pub_list = Book::where('author_id', $request->author)->get();
                $langs = $pub_list->groupBy('lang')->map->count()->toArray();
                $arts_num = Article::where('author_id', $request->author)->count();
                $books_num = $pub_list->count();
                $posts = Post::where('author_id', $request->author)->select(\DB::raw('type_id, count(*) as num'))->groupBy('type_id')->get();
            }
            else{
                $name = 'name_' . app()->getLocale();
                $type = Type::find($request->type);
                $req_type = Str::upper($type->$name);
                $type_id = $type->id;
                $pub_list = Post::where('author_id', $request->author)->where('type_id', $request->type)->get();
                $langs = $pub_list->groupBy('lang')->map->count()->toArray();
                $arts_num = Article::where('author_id', $request->author)->count();
                $books_num = Book::where('author_id', $request->author)->count();
                $posts = Post::where('author_id', $request->author)->select(\DB::raw('type_id, count(*) as num'))->groupBy('type_id')->get();

            };
        }
        else{
            if (app()->getLocale() === 'tg') {
                $req_type = 'МАҚОЛАИ ИЛМӢ';
            }elseif(app()->getLocale() === 'ru'){
                $req_type = 'НАУЧНАЯ СТАТЬЯ';
            }elseif(app()->getLocale() === 'en'){
                $req_type = 'SCIENTIFIC ARTICLE';
            };
            $type_id = 90;
            $pub_list = Article::where('author_id', $request->author)->get(); 
            // $langs = $pub_list->pluck('lang')->unique();
            $langs = $pub_list->groupBy('lang')->map->count()->toArray();
            $arts_num = $pub_list->count();
            $books_num = Book::where('author_id', $request->author)->count();
            $posts = Post::where('author_id', $request->author)->select(\DB::raw('type_id, count(*) as num'))->groupBy('type_id')->get();
        };
        return view('author.show', [
            'author' => Author::find($request->author),
            'articles' => $pub_list,
            'arts_num' => $arts_num,
            'books_num' => $books_num,
            'posts' => $posts,
            'req_type' => $req_type,
            'langs' => $langs,
            'types' => Type::all(),
            'type_id' => $type_id,
        ]);
    }

}
