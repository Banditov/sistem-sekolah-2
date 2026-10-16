<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // GET ALL
    public function index(Request $request)
    {
        $title = "Sistem Sekolah - Daftar Siswa";

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

        $schoolClasses = ['10 AKL', '11 AKL', '12 AKL', '10 BiD', '11 BiD', '12 BiD', '10 TKJ 1', '10 TKJ 2', '11 TKJ 1', '11 TKJ 2', '11 TKJ 3', '12 TKJ 1', '12 TKJ 2', '12 TKJ 3'];
        $majors = ['AKL', 'TKJ', 'BiD'];

        return view('students.index', [
            'title'         => $title,
            'students'      => $students,
            'schoolClasses' => $schoolClasses,
            'majors'        => $majors
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