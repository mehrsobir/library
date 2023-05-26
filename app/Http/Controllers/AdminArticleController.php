<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;


class AdminArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // get all articles
    public function index() {
        Paginator::useBootstrap();
        return view('admin.article.index', [
            'articles' => Article::latest()->paginate(10)
        ]);
    }
    
    public function create(Request $request) {
        return view('admin.article.create', [
            'authors' => Author::all(['id', 'name_tg'])->sortBy('name_tg'),
            'categorys' => Category::all(),
        ]);
    }

    public function edit(Article $article, Request $request) {
        // dd($request->article);
        return view('admin.article.edit', [
            'article' => $request->article,
            'authors' => Author::all(['id', 'name_tg'])->sortBy('name_tg'),
            'categorys' => Category::all(),
        ]);
    }

    public function store(Request $request) {
        // dd(request()->all());
        $formFields = $request->validate([
            'title' => 'required',
            'annotation' => 'required',
            'keywords' => 'required',
            'category_id' => 'required',
            'author_id' => 'required',
            'pages' => 'required',
            'lang' => 'required|min:2|max:2|in:tg,ru,en',
            'pub_place' => 'nullable',
            'pub_date' => 'nullable',
            'pub_link' => 'nullable',
            'pdf' => 'required|mimes:pdf'
        ],
        [
            'title.required' => 'Номи мақола ҳатмист!',
            'annotation.required' => 'Фишурда ҳатмист!',
            'keywords.required' => 'Калидвожаҳо ҳатмиянд!',
            'author_id.required' => 'Интихоби муаллиф ҳатмист!',
            'pages.required' => 'Шумораи саҳифаҳо ҳатмист!',
            'lang.required' => 'Интихоби забон ҳатмист',
            'pdf.required' => 'Лутфан файлро интихоб кунед!',
            'pdf.mimes' => 'Мақола танҳо дар шакли PDF лозим аст!'
        ]);

        if ($request->hasFile('pdf')) {
            $formFields['pdf'] = $request->file('pdf')->store('pdf', 'public');
        }

        Article::create($formFields);

        return redirect('/admin/articles')->with('message', 'Мақола сабт шуд!!'); 
    }  

    public function update(Request $request, Article $article) {
        
        $formFields = $request->validate([
            'title' => 'required',
            'annotation' => 'required',
            'keywords' => 'required',
            'category_id' => 'required',
            'author_id' => 'required',
            'pages' => 'required',
            'lang' => 'required|min:2|max:2|in:tg,ru,en',
            'pub_place' => 'nullable',
            'pub_date' => 'nullable',
            'pub_link' => 'nullable',
            'pdf' => 'mimes:pdf'
        ],
        [
            'title.required' => 'Номи мақола ҳатмист!',
            'annotation.required' => 'Фишурда ҳатмист!',
            'keywords.required' => 'Калидвожаҳо ҳатмиянд!',
            'author_id.required' => 'Интихоби муаллиф ҳатмист!',
            'pages.required' => 'Шумораи саҳифаҳо ҳатмист!',
            'lang.required' => 'Интихоби забон ҳатмист',
            'pdf.mimes' => 'Мақола танҳо дар шакли PDF лозим аст!'
        ]);

        if ($request->hasFile('pdf')) {
            Storage::delete('public/' . $article->pdf);
            $formFields['pdf'] = $request->file('pdf')->store('pdf', 'public');
        }

        $article->update($formFields);

        return redirect('/admin/articles')->with('message', 'Маълумот иваз шуд!!'); 
    }  

    public function destroy(Article $article) {
        Storage::delete('public/' . $article->pdf);
        $article->delete();
        return redirect('/admin/articles')->with('message', 'Мақола ҳазф шуд!!');
    }
}
