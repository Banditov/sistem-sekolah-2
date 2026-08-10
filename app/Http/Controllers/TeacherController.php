<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    // GET ALL
    public function index()
    {
        return "Showing list of all teachers";
    }

    // GET POST FORM
    public function create()
    {
        return "Showing add teacher form";
    }

    // POST
    public function store(Request $request)
    {
        return "Storing teacher data";
    }

    // GET DETAILS
    public function show($id)
    {
        return "Showing teacher with ID: " . $id;
    }

    // GET PUT FORM
    public function edit($id)
    {
        return "Showing edit teacher form with ID: " . $id;
    }

    // PUT
    public function update(Request $request, $id)
    {
        return "Updating teacher data with ID: " . $id;
    }

    // DELETE
    public function destroy($id)
    {
        return "Deleting teacher data with ID: " . $id;
    }
}
