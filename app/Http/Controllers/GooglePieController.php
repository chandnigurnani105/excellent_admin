<?php

namespace App\Http\Controllers;
use App\Models\User;
Use DB;
 
use Carbon\Carbon;

use Illuminate\Http\Request;

class GooglePieController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
          $data['pieChart'] = User::select(\DB::raw("COUNT(*) as count"), \DB::raw("MONTHNAME(created_at) as month_name"))
        ->whereYear('created_at', date('Y'))
        ->groupBy('month_name')
        ->orderBy('count')
        ->get();
    }
}
