<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Type;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;


class AdminPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // get all posts
    public function index() {
        Paginator::useBootstrap();
        return view('admin.post.index', [
            'posts' => Post::latest()->paginate(10)
        ]);
    }
    
    public function create(Request $request) {
        return view('admin.post.create', [
            'authors' => Author::all(['id', 'name_tg'])->sortBy('name_tg'),
            'categorys' => Category::all(),
            'types' => Type::all(),
        ]);
    }

    public function edit(Post $post, Request $request) {
        return view('admin.post.edit', [
            'post' => $request->post,
            'authors' => Author::all(['id', 'name_tg'])->sortBy('name_tg'),
            'categorys' => Category::all(),
            'types' => Type::all(),
        ]);
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'type_id' => 'required',
            'author_id' => 'required',
            'lang' => 'required|min:2|max:2|in:tg,ru,en',
            'pub_place' => 'nullable',
            'pub_date' => 'nullable',
            'pub_link' => 'nullable',
            'image' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048'
        ],
        [
            'title.required' => 'Номи мақола ҳатмист!',
            'body.required' => 'Ҳатмист!',
            'author_id.required' => 'Интихоби муаллиф ҳатмист!',
            'lang.required' => 'Интихоби забон ҳатмист',
            'image.required' => 'Лутфан расмро интихоб кунед!',
            'image.mimes' => 'Расм танҳо дар шакли jpg,jpeg,png,svg лозим аст!',
            'image.image' => 'Файли интихобшуда бояд расм бошад'
        ]);

        if ($request->hasFile('image')) {
            $image       = $request->file('image');
            $imagename = $image->getClientOriginalName();
            $filename    = uniqid() . $imagename;
            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(800, 450);
            $image_resize->save(storage_path('app/public/images/' . $filename));
            $formFields['image'] = 'images/' . $filename;
        }

        Post::create($formFields);

        return redirect('/admin/posts')->with('message', 'Мавод сабт шуд!!'); 
    }  

    public function update(Request $request, Post $post) {
        
        $formFields = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'type_id' => 'required',
            'author_id' => 'required',
            'lang' => 'required|min:2|max:2|in:tg,ru,en',
            'pub_place' => 'nullable',
            'pub_date' => 'nullable',
            'pub_link' => 'nullable',
            'image' => 'image|mimes:jpg,jpeg,png,svg|max:2048'
        ],
        [
            'title.required' => 'Номи мақола ҳатмист!',
            'body.required' => 'Ҳатмист!',
            'author_id.required' => 'Интихоби муаллиф ҳатмист!',
            'lang.required' => 'Интихоби забон ҳатмист',
            'image.mimes' => 'Расм танҳо дар шакли jpg,jpeg,png,svg лозим аст!',
            'image.image' => 'Файли интихобшуда бояд расм бошад'
        ]);

        if ($request->hasFile('image')) {
            Storage::delete('public/' . $post->image);
            $image       = $request->file('image');
            $imagename = $image->getClientOriginalName();
            $filename    = uniqid() . $imagename;
            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(800, 450);
            $image_resize->save(storage_path('app/public/images/' . $filename));
            $formFields['image'] = 'images/' . $filename;
        }

        $post->update($formFields);

        return redirect('/admin/posts')->with('message', 'Маълумот иваз шуд!!'); 
    }  

    public function destroy(Post $post) {
        Storage::delete('public/' . $post->image);
        $post->delete();
        return redirect('/admin/posts')->with('message', 'Мавод ҳазф шуд!!');
    }
}
