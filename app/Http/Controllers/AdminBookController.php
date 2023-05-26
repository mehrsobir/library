<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class AdminBookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // get all books
    public function index() {
        Paginator::useBootstrap();
        return view('admin.book.index', [
            'books' => Book::latest()->paginate(20)
        ]);
    }
    
    public function create(Request $request) {
        return view('admin.book.create', [
            'authors' => Author::all(['id', 'name_tg'])->sortBy('name_tg'),
            'categorys' => Category::all(),
        ]);
    }

    public function edit(Book $book, Request $request) {
        return view('admin.book.edit', [
            'book' => $request->book,
            'authors' => Author::all(['id', 'name_tg'])->sortBy('name_tg'),
            'categorys' => Category::all(),
        ]);
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'annotation' => 'required',
            'category_id' => 'required',
            'author_id' => 'required',
            'pages' => 'required',
            'lang' => 'required|min:2|max:2|in:tg,ru,en',
            'pub_place' => 'required',
            'pub_year' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
            'pdf' => 'required|mimes:pdf'
        ],
        [
            'title.required' => 'Номи китоб ҳатмист!',
            'annotation.required' => 'Фишурда ҳатмист!',
            'author_id.required' => 'Интихоби муаллиф ҳатмист!',
            'pages.required' => 'Шумораи саҳифаҳо ҳатмист!',
            'lang.required' => 'Интихоби забон ҳатмист',
            'image.required' => 'Лутфан расмро интихоб кунед!',
            'image.mimes' => 'Расм танҳо дар шакли jpg,jpeg,png,svg лозим аст!',
            'pdf.required' => 'Лутфан файлро интихоб кунед!',
            'pdf.mimes' => 'Мақола танҳо дар шакли PDF лозим аст!',
            'image.image' => 'Файли интихобшуда бояд расм бошад'
        ]);

        if ($request->hasFile('image')) {
            $image       = $request->file('image');
            $imagename = $image->getClientOriginalName();
            $filename    = uniqid() . $imagename;
            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(300, 420);
            $image_resize->save(storage_path('app/public/images/' . $filename));
            $formFields['image'] = 'images/' . $filename;
        }

        if ($request->hasFile('pdf')) {
            $formFields['pdf'] = $request->file('pdf')->store('books', 'public');
        }

        Book::create($formFields);

        return redirect('/admin/books')->with('message', 'Китоб сабт шуд!!'); 
    }  

    public function update(Request $request, Book $book) {
        
        $formFields = $request->validate([
            'title' => 'required',
            'annotation' => 'required',
            'category_id' => 'required',
            'author_id' => 'required',
            'pages' => 'required',
            'lang' => 'required|min:2|max:2|in:tg,ru,en',
            'pub_place' => 'required',
            'pub_year' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png,svg|max:2048',
            'pdf' => 'mimes:pdf'
        ],
        [
            'title.required' => 'Номи китоб ҳатмист!',
            'annotation.required' => 'Фишурда ҳатмист!',
            'author_id.required' => 'Интихоби муаллиф ҳатмист!',
            'pages.required' => 'Шумораи саҳифаҳо ҳатмист!',
            'lang.required' => 'Интихоби забон ҳатмист',
            'image.mimes' => 'Расм танҳо дар шакли jpg,jpeg,png,svg лозим аст!',
            'pdf.mimes' => 'Мақола танҳо дар шакли PDF лозим аст!',
            'image.image' => 'Файли интихобшуда бояд расм бошад'
        ]);

        if ($request->hasFile('image')) {
            Storage::delete('public/' . $book->image);
            $image       = $request->file('image');
            $imagename = $image->getClientOriginalName();
            $filename    = uniqid() . $imagename;
            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(300, 420);
            $image_resize->save(storage_path('app/public/images/' . $filename));
            $formFields['image'] = 'images/' . $filename;
        }
        

        if ($request->hasFile('pdf')) {
            Storage::delete('public/' . $book->pdf);
            $formFields['pdf'] = $request->file('pdf')->store('books', 'public');
        }

        $book->update($formFields);

        return redirect('/admin/books')->with('message', 'Маълумоти китоб иваз шуд!!'); 
    }  

    public function destroy(Book $book) {
        Storage::delete('public/' . $book->image);
        Storage::delete('public/' . $book->pdf);
        $book->delete();
        return redirect('/admin/books')->with('message', 'Китоб ҳазф шуд!!');
    }
}
