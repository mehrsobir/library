<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Type;
use App\Models\Article;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function main() {
        return view('main', [
            'articles' => Article::latest()->where('lang', app()->getLocale())->paginate(11),
            'posts' => Post::latest()->where('lang', app()->getLocale())->paginate(8),
            'types' => Type::all()
        ]);
    }


}
