<?php
// app/Http/Controllers/PropertyController.php

namespace App\Http\Controllers;

use App\Imports\PropertiesImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Middleware\AdminAuthenticate;

class PropertyController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }
    
    public function importPropertiesForm()
    {
        return view('property.import');
    }

    public function importProperties()
    {
        request()->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = request()->file('file');

        Excel::import(new PropertiesImport, $file);

        return redirect()->route('property.import.form')->with('success', 'Properties imported successfully.');
    }
}