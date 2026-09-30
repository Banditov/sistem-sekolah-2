<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;

class StudentController extends Controller
{
    // GET ALL
    public function index()
    {
        $title = "Sistem Sekolah - Daftar Siswa";

        $students = Student::select(['id', 'nis', 'name', 'class', 'major'])
            ->get();

        return view('students.index', [
            'title' => $title,
            'students' => $students,
        ]);
    }

    // GET DETAILS
    public function show(Student $student)
    {
        $title = "Sistem Sekolah - Detail Siswa";

        return view('students.show', [
            'title'     => $title,
            'student'   => $student
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
    public function store(StoreRequest $request)
    {
        // Validasi
        $validatedRequest = $request->validated();

        // Tambahkan Data ke Database
        Student::create($validatedRequest);

        // Handle If Success
        return redirect()->route('students.index');
    }

    // GET PUT FORM
    public function edit(Student $student)
    {
        $title = "Sistem Sekolah - Edit Siswa";

        return view('students.edit', [
            'title' => $title,
            'student' => $student,
        ]);
    }

    // PUT
    public function update(Student $student, UpdateRequest $request)
    {
        // Validasi
        $validatedRequest = $request->validated();

        // Update Data
        $student->update($validatedRequest);

        // Handle if Success
        return redirect()->route('students.index');
    }

    // DELETE
    public function destroy(Student $student)
    {
        // Delete Data
        $student->delete();

        // Handle if Success
        return redirect()->route('students.index');
    }
}