<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    // GET ALL
    public function index()
    {
        return view('students.index');
    }

    // GET POST FORM
    public function create()
    {
        return view('students.create');
    }

    // POST
    public function store(Request $request)
    {
        return "Storing student data";
    }

    // GET DETAILS
    public function show($id)
    {
        return view('students.show');
    }

    // GET PUT FORM
    public function edit($id)
    {
        return view('students.edit');
    }

    // PUT
    public function update(Request $request, $id)
    {
        return "Updating student data with ID: " . $id;
    }

    // DELETE
    public function destroy($id)
    {
        return "Deleting student data with ID: " . $id;
    }
}