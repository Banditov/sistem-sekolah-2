<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MajorController extends Controller
{
    // GET ALL
    public function index()
    {
        return "Showing list of all majors";
    }

    // GET POST FORM
    public function create()
    {
        return "Showing add major form";
    }

    // POST
    public function store(Request $request)
    {
        return "Storing major data";
    }

    // GET DETAILS
    public function show($id)
    {
        return "Showing major with ID: " . $id;
    }

    // GET PUT FORM
    public function edit($id)
    {
        return "Showing edit major form with ID: " . $id;
    }

    // PUT
    public function update(Request $request, $id)
    {
        return "Updating major data with ID: " . $id;
    }

    // DELETE
    public function destroy($id)
    {
        return "Deleting major data with ID: " . $id;
    }
}
