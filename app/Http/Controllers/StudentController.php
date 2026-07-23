<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
  public function index()
  {
      return "Ini adalah halaman daftar siswa";
  }

  public function create()
  {
      return "Ini adalah halaman untuk menambahkan siswa baru";
  }

  public function show(string $id)
  {
      return "Menampilkan detail siswa dengan ID: {$id}";
  }

  public function edit(string $id)
  {
      return "Ini adalah halaman untuk mengedit siswa dengan ID: {$id}";
  }

  public function store()
  {
      return "Data siswa baru telah disimpan.";
  }

  public function update(string $id)
  {
      return "Data siswa dengan ID: {$id} telah diperbarui.";
  }

  public function destroy(string $id)
  {
      return "Data siswa dengan ID: {$id} telah dihapus.";
  }
}
