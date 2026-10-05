<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;

class StudentController extends Controller
{
  public function index()
  {
      $title = 'Sistem Sekolah - Daftar Siswa';
      $students = Student::select(['id', 'nis', 'name', 'class', 'major'])->get();
      return view('students.index', [
          'title' => $title,
          'students' => $students
      ]);
  }

  public function create()
  {
      $title = 'Sistem Sekolah - Menambah Siswa';
      return view('students.create', [
          'title' => $title
      ]);
  }

  public function show(string $student)
  {
      $title = 'Sistem Sekolah - Detail Siswa';
     
    return view('students.show', [
            'title' => $title,
            'student' => $student
        ]);
  }

  public function edit(Student $student)
  {   
      $title = 'Sistem Sekolah - Ubah Data Siswa';
      return view('students.edit', [
          'title' => $title,
          'student' => $student
      ]);
  }

  public function store(Request $request)
  {
    $validatedRequest = $request->validate([
        'nis' => ['required', 'string', 'size:4', 'unique:students,nis'],
        'name' => ['required', 'string'],
        'gender' => ['required', 'string', 'in:Laki-Laki,Perempuan'],
        'major' => ['required', 'string', 'in:AKL,TKJ,BiD'],
        'class' => ['required', 'string'],
    ]);

    Student::create($validatedRequest);
   
    return redirect()->route('students.index');
  }

  public function update(Student $student, Request $request)
  {
    $validatedRequest = $request->validate([
        'nis' => ['required', 'string', 'size:4', 'unique:students,nis,' . $student->id],
        'name' => ['required', 'string'],
        'gender' => ['required', 'string', 'in:Laki-Laki,Perempuan'],
        'major' => ['required', 'string', 'in:AKL,TKJ,BiD'],
        'class' => ['required', 'string'],
    ]);

    $student->update($validatedRequest);
   
    return redirect()->route('students.index');
  }

  public function destroy(Student $student)
  {
    $student->delete();
    return redirect()->route('students.index');
  }
}
