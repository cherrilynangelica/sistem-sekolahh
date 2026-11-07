<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreRequest;

use Illuminate\Http\Request;

use App\Models\Student;

class StudentController extends Controller
{
  public function index(Request $request)
  {
      $title = 'Sistem Sekolah - Daftar Siswa';
      $search = $request->query('search');
      $class = $request->query('class');
      $major = $request->query('major');

      $students = Student::select(['id', 'nis', 'name', 'class', 'major'])
      ->when($search, function ($query, $search) {
          $query->where(function ($query) use ($search) {
              $query->where('name', 'like', "%{$search}%")
                    ->orWhere('nis', 'like', "%{$search}%");
          });
      })

      ->when($class, fn($query, $class) => $query->where('class', '=', $class))
      ->when($major, fn($query, $major) => $query->where('major', '=', $major))
      ->paginate(10)
      ->withQueryString();

      $Schoolclasses = ['10 AKL', '10 TKJ', '10 BiD', '11 AKL', '11 TKJ', '11 BiD', '12 AKL', '12 TKJ', '12 BiD'];
      $majors = ['AKL', 'TKJ', 'BiD'];

      return view('students.index', [
          'title' => $title,
          'students' => $students,
          'Schoolclasses' => $Schoolclasses,
          'majors' => $majors
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

  public function store(StoreRequest $request)
  {
    $validatedRequest = $request->validated();

    Student::create($validatedRequest);
   
    return redirect()->route('students.index');
  }

  public function update(Student $student, UpdateRequest $request)
  {
    $validatedRequest = $request->validated();

    $student->update($validatedRequest);
   
    return redirect()->route('students.index');
  }

  public function destroy(Student $student)
  {
    $student->delete();
    return redirect()->route('students.index');
  }
}
