<?php

namespace App\Http\Controllers\Biometric;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BiometricImportController extends Controller
{
    public function index()
    {
        return view('biometric/import');
    }
}
