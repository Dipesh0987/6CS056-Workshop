<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Student;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();
        return view('students.list', ['students' => $students]);
    }
    public function show(){
        $students = Student::findorFail($id);
        return view('student.detail', ['students' => $students]);
    }
    public function create(){
        return view('students.create');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:students,email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'dateofbirth' => 'nullable|date',
        ]);
        $student = Student::create($validated);
        return redirect ()
            ->route('students.index')
            ->with('success', "Student {$student->name} created successfully.");
    }
    public function edit($id){
        $student = Student::findOrFail($id);
        return view('student.edit', ['student' => $student,]);
    }
    public function update(Request $request, $id){
        $student = Student::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('students')->ignore($student->id)],
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
            'dateofbirth' => 'nullable|date',
        ]);
        $student->update($validated);
        return redirect()
            ->route('students.show', $student->id)
            ->with('success', "Student {$student->name} updated successfully.");
    }
    public function destroy($id){
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()
            ->route('students.index')
            ->with('success', "Student deleted successfully.");
    }
}
