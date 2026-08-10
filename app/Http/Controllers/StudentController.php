<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    // GET ALL
    public function index()
    {
        return "Showing list of all students";
    }

    // GET POST FORM
    public function create()
    {
        return "Showing add student form";
    }

    // POST
    public function store(Request $request)
    {
        return "Storing student data";
    }

    // GET DETAILS
    public function show($id)
    {
        return "Showing student with ID: " . $id;
    }

    // GET PUT FORM
    public function edit($id)
    {
        return "Showing edit student form with ID: " . $id;
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
