<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Student;
use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function rules()
    {
        return [];
    }
    
    public function home()
    {
        return view('admin', [
            
        ]);
    }

    
    // get all articles
    public function index() {
        Paginator::useBootstrap();
        return view('student.index', [
            'students' => Student::latest()->paginate(10)
        ]);
    }
    
    public function edit(Student $student, Request $request) {
        return view('student.edit', [
            'student' => $request->student
        ]);
    }

    public function create() {
        return view('student.create', [
            
        ]);
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => 'required',
            'phone' => 'nullable|max:13|min:7',
            'image' => 'image|mimes:jpg,jpeg,png,svg|max:2048'
        ]
        );

        if ($request->hasFile('image')) {
            $image       = $request->file('image');
            $imagename = $image->getClientOriginalName();
            $filename    = uniqid() . $imagename;
            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(300, 300);
            $image_resize->save(storage_path('app/public/images/' . $filename));
            $formFields['image'] = 'images/' . $filename;
        }

        Student::create($formFields);

        return redirect('/students')->with('message', 'Success!!'); 
    }  

    public function update(Request $request, Student $student) {
        
        $formFields = $request->validate([
            'name' => 'required',
            'phone' => 'nullable|max:13|min:7',
            'image' => 'image|mimes:jpg,jpeg,png,svg|max:2048'
        ]
        );

        if ($request->hasFile('image')) {
            Storage::delete('public/' . $student->image);
            $image       = $request->file('image');
            $imagename = $image->getClientOriginalName();
            $filename    = uniqid() . '_' . $imagename;
            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(300, 300);
            $image_resize->save(storage_path('app/public/images/' . $filename));
            $formFields['image'] = 'images/' . $filename;
        }

        $student->update($formFields);

        return redirect('/students')->with('message', 'Done!!'); 
    }  

    public function destroy(Student $student) {
        Storage::delete('public/' . $student->image);
        $student->delete();
        return redirect('/students')->with('message', 'Deleted!!');
    }
}
