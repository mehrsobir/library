<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Post;
use App\Models\Author;
use App\Models\Article;
use App\Models\Position;
use App\Models\Education;
use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class AdminAuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function rules()
    {
        return [];
    }

    public function stats()
    {
        return view('admin', [
            'author_num' => Author::all()->count(),
            'article_num' => Article::all()->count(),
            'pub_article_num' => Post::all()->count(), //->where('type', '=', 'Мақола')->count(),
            'book_num' => Book::all()->count(),
            'institution_num' => Institution::all()->count(),
        ]);
    }

    // get all articles
    public function index() {
        Paginator::useBootstrap();
        return view('admin.author.index', [
            'authors' => Author::latest()->paginate(10)
        ]);
    }
    
    public function edit(Author $author, Request $request) {
        return view('admin.author.edit', [
            'author' => $request->author,
            'educations' => Education::all(),
            'positions' => Position::all(),
            'institutions' => Institution::all(),
        ]);
    }

    public function create() {
        return view('admin.author.create', [
            'educations' => Education::all(),
            'positions' => Position::all(),
            'institutions' => Institution::all(),
        ]);
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'name_tg' => 'required',
            'name_ru' => 'required',
            'name_en' => 'required',
            'education_id' => 'required',
            'position_id' => 'required',
            'institution_id' => 'required',
            'phone' => 'nullable|max:13|min:7',
            'email' => 'nullable|email',
            'image' => 'image|mimes:jpg,jpeg,png,svg|max:2048'
        ],
        [
            'name_tg.required' => 'Ному насаб ҳатмист!',
            'phone.max' => 'Рақам бояд аз 13 рамз зиёд набошад!',
            'phone.min' => 'Рақам бояд аз 7 рамз кам набошад!',
            'image.mimes' => 'Расм танҳо дар шакли jpg,jpeg,png,svg лозим аст!',
            'image.image' => 'Файли интихобшуда бояд расм бошад'
        ]);

        if ($request->hasFile('image')) {
            $image       = $request->file('image');
            $imagename = $image->getClientOriginalName();
            $filename    = uniqid() . $imagename;
            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(300, 300);
            $image_resize->save(storage_path('app/public/images/' . $filename));
            $formFields['image'] = 'images/' . $filename;
        }

        Author::create($formFields);

        return redirect('/admin/authors')->with('message', 'Муаллиф сабт шуд!!'); 
    }  

    public function update(Request $request, Author $author) {
        
        $formFields = $request->validate([
            'name_tg' => 'required',
            'name_ru' => 'required',
            'name_en' => 'required',
            'education_id' => 'required',
            'position_id' => 'required',
            'institution_id' => 'required',
            'phone' => 'nullable|max:13|min:7',
            'email' => 'nullable|email',
            'image' => 'image|mimes:jpg,jpeg,png,svg|max:2048'
        ],
        [
            'name_tg.required' => 'Ному насаб ҳатмист!',
            'phone.max' => 'Рақам бояд аз 13 рамз зиёд набошад!',
            'phone.min' => 'Рақам бояд аз 7 рамз кам набошад!',
            'image.mimes' => 'Расм танҳо дар шакли jpg,jpeg,png,svg лозим аст!',
            'image.image' => 'Файли интихобшуда бояд расм бошад'
        ]);

        if ($request->hasFile('image')) {
            Storage::delete('public/' . $author->image);
            $image       = $request->file('image');
            $imagename = $image->getClientOriginalName();
            $filename    = uniqid() . '_' . $imagename;
            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(300, 300);
            $image_resize->save(storage_path('app/public/images/' . $filename));
            $formFields['image'] = 'images/' . $filename;
        }

        $author->update($formFields);

        return redirect('/admin/authors')->with('message', 'Маълумот иваз шуд!!'); 
    }  

    public function destroy(Author $author) {
        Storage::delete('public/' . $author->image);
        $author->delete();
        return redirect('/admin/authors')->with('message', 'Муаллиф ҳазф шуд!!');
    }
}
