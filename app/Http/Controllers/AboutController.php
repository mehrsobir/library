<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index() {
        return view('about', [
            'abouts' => About::all(),
            'types' => Type::all(),
        ]);
    }
    
    public function admin_index() {
        return view('admin.about.index', [
            'abouts' => About::all()
        ]);
    }

    public function create(Request $request, About $about) {
        return view('admin.about.create');
    }

    public function edit(About $about, Request $request) {
        return view('admin.about.edit', [
            'about' => $about
        ]);
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'title_tg' => 'required',
            'annotation_tg' => 'required',
            'title_ru' => 'required',
            'annotation_ru' => 'required',
            'title_en' => 'required',
            'annotation_en' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048'
        ],
        [
            'title_tg.required' => 'Номи китоб ҳатмист!',
            'annotation_tg.required' => 'Фишурда ҳатмист!',
            'image.mimes' => 'Расм танҳо дар шакли jpg,jpeg,png,svg лозим аст!',
            'image.image' => 'Файли интихобшуда бояд расм бошад'
        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        About::create($formFields);

        return redirect('/admin/about')->with('message', 'Маълумот сабт шуд!!'); 
    }  

    public function update(Request $request, About $about) {
        
        $formFields = $request->validate([
            'title_tg' => 'required',
            'annotation_tg' => 'required',
            'title_ru' => 'required',
            'annotation_ru' => 'required',
            'title_en' => 'required',
            'annotation_en' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png,svg|max:2048'
        ],
        [
            'title_tg.required' => 'Номи китоб ҳатмист!',
            'annotation_tg.required' => 'Фишурда ҳатмист!',
            'image.mimes' => 'Расм танҳо дар шакли jpg,jpeg,png,svg лозим аст!',
            'image.image' => 'Файли интихобшуда бояд расм бошад'
        ]);

        if ($request->hasFile('image')) {
            Storage::delete('public/' . $about->image);
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        $about->update($formFields);

        return redirect('/admin/about')->with('message', 'Маълумоти китоб иваз шуд!!'); 
    }  

    public function destroy(About $about) {
        Storage::delete('public/' . $about->image);
        $about->delete();
        return redirect('/admin/about')->with('message', 'Маълумот ҳазф шуд!!');
    }
}
