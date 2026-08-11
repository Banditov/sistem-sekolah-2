<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    // GET ALL
    public function index()
    {
        $title = "Sistem Sekolah - Daftar Siswa";
        $students = $this->getStudents();

        return view('students.index', [
            'title' => $title,
            'students' => $students,
        ]);
    }

    // GET DETAILS
    public function show($id)
    {
        $title = "Sistem Sekolah - Detail Siswa";
        $student = $this->findStudent($id);

        return view('students.show', [
            'title' => $title,
            'student' => $student,
        ]);
    }

    // GET POST FORM
    public function create()
    {
        $title = "Sistem Sekolah - Tambah Siswa";

        return view('students.create', [
            'title' => $title,
        ]);
    }

    // POST
    public function store(Request $request)
    {
        return redirect()
            ->route('students.index')
            ->with('success', 'Siswa berhasil ditambahkan ke buku induk.');
    }

    // GET PUT FORM
    public function edit($id)
    {
        $title = "Sistem Sekolah - Edit Siswa";
        $student = $this->findStudent($id);

        return view('students.edit', [
            'title' => $title,
            'student' => $student,
        ]);
    }

    // PUT
    public function update(Request $request, $id)
    {
        $student = $this->findStudent($id);

        return redirect()
            ->route('students.show', $student['id'])
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    // DELETE
    public function destroy($id)
    {
        $student = $this->findStudent($id);

        return redirect()
            ->route('students.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}