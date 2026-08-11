<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index()
    {
      $title = 'Sistem Sekolah - Daftar Jurusan';
      $majors = [
          [
              'id' => 1,
              'code' => 'AKL',
              'name' => 'Akuntansi dan Keuangan Lembaga',
              'description' => 'Program keahlian yang membekali murid dengan kompetensi pencatatan dan pelaporan keuangan.',
          ],
          [
              'id' => 2,
              'code' => 'TKJ',
              'name' => 'Teknik Komputer dan Jaringan',
              'description' => 'Program keahlian yang membekali murid dengan kompetensi instalasi, konfigurasi, dan pemeliharaan jaringan komputer.',
          ],      
          [
              'id' => 3,
              'code' => 'BD',
              'name' => 'bisnis Digital',
              'description' => 'Program keahlian yang membekali murid dengan kompetensi pemasaran dan pengelolaan bisnis berbasis digital.',
          ],      
      ];
      return view('majors.index', [
          'title' => $title,
          'majors' => $majors
      ]);
    }

    public function create()
    {
         $title = 'Sistem Sekolah - Menambah Jurusan';
      return view('majors.create', [
          'title' => $title
      ]);
    }

    public function store(Request $request)
    {
         $title = 'Sistem Sekolah - Detail Jurusan';
      return view('majors.show', [
          'title' => $title
      ]);
    }

    public function show(string $id)
    {
         $title = 'Sistem Sekolah - Detail Jurusan';
      return view('majors.show', [
          'title' => $title
      ]);
    }

    public function edit(string $id)
    {
        $title = 'Sistem Sekolah - Ubah Data Jurusan';
      return view('majors.edit', [
          'title' => $title
      ]);
    }

    public function update(Request $request, string $id)
    {
        return "Melakukan perubahan data jurusan";
    }

    public function destroy(string $id)
    {
        return "Menghapus data jurusan";
    }
}
