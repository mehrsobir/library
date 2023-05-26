<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\Journalinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JournalController extends Controller
{
    public function index(Request $request) {
        $journal = Journal::latest()->first();
        return view('journal.index', [
            'journal' => $journal,
            'journalinfos' => Journalinfo::all()

        ]);
    }

    public function archive(Request $request) {
        $journals = Journal::latest()->get();
        $years = $journals->groupBy('year');
        // dd($years);
        // $years = Journal::select(\DB::raw('year, GROUP_CONCAT(number) as num'))->groupBy('year')->get();
        return view('journal.archive', [
            'journals' => $journals,
            'years' => $years,
            'journalinfos' => Journalinfo::all()

        ]);
    }

    public function export(Request $request) {
        $file = Journal::where('slug', $request->journal)->first();

        return response()->file(
            storage_path('app/public/' . $file->pdf)
        );
    
    }

    public function admin_index() {
        $journals = Journal::latest()->get();
        return view('journal.admin_index', [
            'journals' => $journals
        ]);
    }
    
    public function create(Request $request) {
        return view('journal.create');
    }

    public function edit(Journal $journal, Request $request) {
        return view('journal.edit', [
            'journal' => $request->journal
        ]);
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'year' => 'required',
            'number' => 'required',
            'total_number' => 'required',
            'pdf' => 'required|mimes:pdf'
        ]);

        if ($request->hasFile('pdf')) {
            $formFields['pdf'] = $request->file('pdf')->store('journal', 'public');
        }
        $formFields['slug'] = $request->year . '-' . $request->number;

        Journal::create($formFields);

        return redirect('/admin/journals')->with('message', 'Маҷалла сабт шуд!!'); 
    }  

    public function update(Request $request, Journal $journal) {
        
        $formFields = $request->validate([
            'year' => 'required',
            'number' => 'required',
            'total_number' => 'required',
            'pdf' => 'mimes:pdf'
        ]);

        if ($request->hasFile('pdf')) {
            Storage::delete('public/' . $journal->pdf);
            $formFields['pdf'] = $request->file('pdf')->store('journal', 'public');
        }
        $formFields['slug'] = $request->year . '-' . $request->number;

        $journal->update($formFields);

        return redirect('/admin/journals')->with('message', 'Маҷалла иваз шуд!!'); 
    }  

    public function destroy(Journal $journal) {
        Storage::delete('public/' . $journal->pdf);
        $journal->delete();
        return redirect('/admin/journals')->with('message', 'Мақола ҳазф шуд!!');
    }
}
