<?php

namespace App\Http\Controllers;

use App\Models\Journalinfo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JournalinfoController extends Controller
{
    public function index() {
        return view('journalinfo.index', [
            'journalinfos' => Journalinfo::select('title_tg', 'title_ru', 'title_en')->get(),
        ]);
    }

    public function show(Request $request) {
        $title = Str::upper(str_replace('-', ' ', $request->title_en));
        $journalinfo = Journalinfo::where('title_en',  $title)->first();
        return view('journalinfo.show', [
            'journalinfos' => Journalinfo::select('title_tg', 'title_ru', 'title_en')->get(),
            'journalinfo' => $journalinfo
        ]);
    }
    
    public function admin_index() {
        return view('journalinfo.admin_index', [
            'journalinfos' => Journalinfo::all()
        ]);
    }

    public function create(Request $request, Journalinfo $journalinfo) {
        return view('journalinfo.create');
    }

    public function edit(Journalinfo $journalinfo, Request $request) {
        return view('journalinfo.edit', [
            'journalinfo' => $journalinfo
        ]);
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'title_tg' => 'required',
            'body_tg' => 'required',
            'title_ru' => 'required',
            'body_ru' => 'required',
            'title_en' => 'required',
            'body_en' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048'
        ],
        [
            'title_tg.required' => 'Номи китоб ҳатмист!',
            'body_tg.required' => 'Фишурда ҳатмист!',
            'image.mimes' => 'Расм танҳо дар шакли jpg,jpeg,png,svg лозим аст!',
            'image.image' => 'Файли интихобшуда бояд расм бошад'
        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }
        
        $formFields['title_tg'] = Str::upper($formFields['title_tg']);
        $formFields['title_ru'] = Str::upper($formFields['title_ru']);
        $formFields['title_en'] = Str::upper($formFields['title_en']);

        Journalinfo::create($formFields);

        return redirect('/admin/journalinfos')->with('message', 'Маълумот сабт шуд!!'); 
    }  

    public function update(Request $request, Journalinfo $journalinfo) {
        
        $formFields = $request->validate([
            'title_tg' => 'required',
            'body_tg' => 'required',
            'title_ru' => 'required',
            'body_ru' => 'required',
            'title_en' => 'required',
            'body_en' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png,svg|max:2048'
        ],
        [
            'title_tg.required' => 'Номи китоб ҳатмист!',
            'body_tg.required' => 'Фишурда ҳатмист!',
            'image.mimes' => 'Расм танҳо дар шакли jpg,jpeg,png,svg лозим аст!',
            'image.image' => 'Файли интихобшуда бояд расм бошад'
        ]);

        $formFields['title_tg'] = Str::upper($formFields['title_tg']);
        $formFields['title_ru'] = Str::upper($formFields['title_ru']);
        $formFields['title_en'] = Str::upper($formFields['title_en']);

        if ($request->hasFile('image')) {
            Storage::delete('public/' . $journalinfo->image);
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        $journalinfo->update($formFields);

        return redirect('/admin/journalinfos')->with('message', 'Маълумот иваз шуд!!'); 
    }  

    public function destroy(Journalinfo $journalinfo) {
        Storage::delete('public/' . $journalinfo->image);
        $journalinfo->delete();
        return redirect('/admin/journalinfos')->with('message', 'Маълумот ҳазф шуд!!');
    }
}
