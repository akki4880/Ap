<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Middleware\AdminAuthenticate;

class ImportUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }
    
    
    public function importForm()
    {
        return view('import-form');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        // Specify custom date format (if needed)
        $dateFormat = 'Y-m-d'; // Change this format according to your needs

        Excel::import(new UsersImport($dateFormat), $request->file('file'));

        return redirect()->back()->with('success', 'Users imported successfully!');
    }
}