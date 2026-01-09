<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Student;

class StudentController extends Controller
{
    //
    public function index()
    {
        $students = Student::with('school')->paginate(10);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $schools = School::all();
        return view('students.create', compact('schools'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required',
            'student_id' => 'required',
            'email' => 'required',
            'phone' => 'nullable',
            'school_id' => 'required|exists:schools,id'
        ]);

        Student::create($validated);

        return redirect()->route('students.index')->with('Thành công', 'Học sinh đã được thêm mới thành công !');
    }

    public function edit(Student $student)
    {
        $schools = School::all();
        return view('students.edit', compact('student', 'schools'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'full_name' => 'required',
            'student_id' => 'required',
            'email' => 'required',
            'phone' => 'nullable',
            'school_id' => 'required|exists:schools,id'
        ]);

        $student->update($validated);

        return redirect()->route('students.index')->with('Thành công', 'Cập nhật học sinh thành công !');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('Thành công', 'Học sinh đã được xóa thành công !');
    }
}
