<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        // Validasi
        $validatedRequest = $request->validate([
            'nis'    => ['required', 'string', 'size:4', 'unique:students,nis'],
            'name'   => ['required', 'string'],
            'gender' => ['required', 'string', 'in:Laki-laki,Perempuan'],
            'major'  => ['required', 'string', 'in:AKL,TKJ,BiD'],
            'class'  => ['required', 'string']
        ]);

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
    public function update(Student $student, Request $request)
    {
        // Validasi
        $validatedRequest = $request->validate([
            'nis'    => ['required', 'string', 'size:4', 'unique:students,nis,' . $student->id],
            'name'   => ['required', 'string'],
            'gender' => ['required', 'string', 'in:Laki-laki,Perempuan'],
            'major'  => ['required', 'string', 'in:AKL,TKJ,BiD'],
            'class'  => ['required', 'string']
        ]);

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