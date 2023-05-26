<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    
    public function index() {
        return view('admin.institution.index', [
            'institutions' => Institution::all()
        ]);
    }

    public function create(Request $request, Institution $institution) {
        return view('admin.institution.create');
    }

    public function edit(Institution $institution, Request $request) {
        return view('admin.institution.edit', [
            'institution' => $institution
        ]);
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'name_tg' => 'required',
            'name_ru' => 'required',
            'name_en' => 'required'
        ],
        [
            'name_tg.required' => 'Номи китоб ҳатмист!'
        ]);

        Institution::create($formFields);

        return redirect('/admin/institutions')->with('message', 'Маълумот сабт шуд!!'); 
    }  

    public function update(Request $request, Institution $institution) {
        
        $formFields = $request->validate([
            'name_tg' => 'required',
            'name_ru' => 'required',
            'name_en' => 'required'
        ],
        [
            'name_tg.required' => 'Номи китоб ҳатмист!'
        ]);

        $institution->update($formFields);

        return redirect('/admin/institutions')->with('message', 'Маълумоти китоб иваз шуд!!'); 
    }  

    public function destroy(Institution $institution) {
        $institution->delete();
        return redirect('/admin/institutions')->with('message', 'Маълумот ҳазф шуд!!');
    }
}
