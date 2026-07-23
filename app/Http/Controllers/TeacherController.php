<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return "Ini adalah halaman daftar guru";
    }

    public function create()
    {
        return "Ini adalah halaman untuk menambahkan guru baru";
    }

    public function show(string $id)
    {
        return "Menampilkan detail guru dengan ID: {$id}";
    }

    public function edit(string $id)
    {
        return "Ini adalah halaman untuk mengedit guru dengan ID: {$id}";
    }

    public function store()
    {
        return "Data guru baru telah disimpan.";
    }

    public function update(string $id)
    {
        return "Data guru dengan ID: {$id} telah diperbarui.";
    }

    public function destroy(string $id)
    {
        return "Data guru dengan ID: {$id} telah dihapus.";
    } 
}
