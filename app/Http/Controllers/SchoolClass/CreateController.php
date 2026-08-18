<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke(Request $request)
    {
       $teacher = [
        [
            'id' => 1,
            'name' => 'Budi Santoso',
        ],
        [
            'id' => 2,
            'name' => 'Siti Aminah',
        ],
       ];

       $major = [
        [
            'id' => 1,
            'code' => 'AKL',
        ],
        [
            'id' => 2,
            'code' => 'TKJ',
        ],
        [
            'id' => 3,
            'code' => 'BD',
        ],
       ];

          $title = 'Sistem Sekolah - Menambah Kelas';
      return view('schoolclasses.create', [
          'title' => $title,
          'teachers' => $teacher,
          'majors' => $major,
      ]);

    }
}
