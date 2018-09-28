<?php

namespace App\Http\Controllers;

use App\Pet;

class PetsController extends Controller
{
    public function index()
    {
        return Pet::with('user')->get();
    }
}
