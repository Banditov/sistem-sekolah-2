<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Request $request)
    {
        return "Showing class with ID: {$request->id}";
    }
}
