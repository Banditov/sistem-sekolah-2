<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(Request $request)
    {
        return "Deleting class with ID: {$request->id}";
    }
}
