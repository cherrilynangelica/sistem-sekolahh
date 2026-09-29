<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

  public function show(string $id)
  {
      $title = 'Sistem Sekolah - Detail Siswa';
      print_r($id);
      exit;
      return view('students.show', [
          'title' => $title
      ]);
  }

  public function edit(string $id)
  {   
      $title = 'Sistem Sekolah - Ubah Data Siswa';
      return view('students.edit', [
          'title' => $title
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

  public function update(string $id)
  {
      return "Melakukan perubahan data siswa";
  }

  public function destroy(string $id)
  {
      return "Menghapus data siswa";
  }
}
