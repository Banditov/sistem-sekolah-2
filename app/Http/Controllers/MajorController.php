<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MajorController extends Controller
{
    // GET ALL
        public function index()
    {
        $title = "Sistem Sekolah - Daftar Jurusan";
        $majors = $this->getMajors();

        return view('majors.index', [
            'title' => $title,
            'majors' => $majors,
        ]);
    }

    // GET DETAILS
    public function show($id)
    {
        $title = "Sistem Sekolah - Detail Jurusan";
        $major = $this->findMajor($id);

        return view('majors.show', [
            'title' => $title,
            'major' => $major,
        ]);
    }

    // GET POST FORM
    public function create()
    {
        $title = "Sistem Sekolah - Tambah Jurusan";

        return view('majors.create', [
            'title' => $title,
        ]);
    }

    // POST
    public function store(Request $request)
    {

        return redirect()
            ->route('majors.index')
            ->with('success', 'Jurusan berhasil ditambahkan ke buku induk.');
    }

    // GET PUT FORM
    public function edit($id)
    {
        $title = "Sistem Sekolah - Edit Jurusan";
        $major = $this->findMajor($id);

        return view('majors.edit', [
            'title' => $title,
            'major' => $major,
        ]);
    }

    // PUT
    public function update(Request $request, $id)
    {
        $major = $this->findMajor($id);

        return redirect()
            ->route('majors.show', $major['id'])
            ->with('success', 'Data jurusan berhasil diperbarui.');
    }

    // DELETE
    public function destroy($id)
    {
        $major = $this->findMajor($id);

        return redirect()
            ->route('majors.index')
            ->with('success', 'Data jurusan berhasil dihapus.');
    }
}
