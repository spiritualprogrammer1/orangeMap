<?php

namespace App\Http\Controllers;

use App\Imports\SiteImport;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel;

class FileExcelController extends Controller
{
    public function indexx()
    {
        return view('layout.apps');
    }
    public function index()
    {
        return view('insertdata');
    }

    public function store(Request $request)
    {

      //  Excel::import(new SiteImport,request()->file('file'));
      \Maatwebsite\Excel\Facades\Excel::import(new SiteImport,request()->file('file'));

//         collect(head($data))
//            ->each(function ($row, $key) {
//                DB::table('sites')
//                    ->where('code_site', $row['sites_code_ihs'])
//                    ->update(Arr::except($row, ['sites_code_ihs']));
//            });

        return back();



    }
}
