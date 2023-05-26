<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Type;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class PostController extends Controller
{
    public function index(Request $request) {
        Paginator::useBootstrap();
        if ($request->category) {
            $posts = Post::latest()->where('lang', app()->getLocale())->where('category_id', $request->category)->paginate(10);
        }else{
            $posts = Post::latest()->where('lang', app()->getLocale())->paginate(10);
        };
        return view('post.index', [
            'posts' => $posts,
            'types' => Type::all(),
            'cats' => Category::all(),
            'selected' => $request->category
        ]);
    }

    public function search(Request $request) {
        Paginator::useBootstrap();
        $search = $request->search;
        if ($search) {
            $posts = Post::where('lang', app()->getLocale())
            ->where(function($query)  use ($search){
                $query->where('title', 'like', '%' . $search . '%')-> orWhere('body', 'like', '%' . $search . '%');
            })->paginate(10);
        }else{
            $posts = Post::latest()->where('lang', app()->getLocale())->paginate(10);
        };
        return view('post.index', [
            'posts' => $posts,
            'types' => Type::all(),
            'cats' => Category::all(),
        ]);
    }

    public function post_type(Request $request) {
        Paginator::useBootstrap();
        $req_type = $request->type;
        if ($request->category) {
            $posts = Post::latest()->where('lang', app()->getLocale())->where('type_id', $req_type)->where('category_id', $request->category)->paginate(10);
        }else{
            $posts = Post::latest()->where('lang', app()->getLocale())->where('type_id', $req_type)->paginate(10);
        };
        return view('post.index', [
            'posts' => $posts,
            'types' => Type::all(),
            'cats' => Category::all(),
            'reqtype' => $req_type,
            'selected' => $request->category
        ]);
    }

    public function show(Request $request) {
        $post = Post::where('slug', $request->post)->first();
        return view('post.show', [
            'post' => $post,
            'types' => Type::all(),
        ]);
    }
}
