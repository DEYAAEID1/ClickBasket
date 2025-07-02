<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
class ProductImportController extends Controller
{
   public function import(Request $request)
{
    Excel::import(new ProductsImport, $request->file('file'));
    return back()->with('success', 'Products imported successfully!');
}
}
