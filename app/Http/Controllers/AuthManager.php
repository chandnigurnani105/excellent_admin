<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Target;

use DB;
use Illuminate\Http\Request;

class AuthManager extends Controller
{
    
   public function create(Request $request)
    {
       
        $data = $request->all();
       

        $total = $request->blogs + $request->social_media + $request->website +  $request->apps;

        if($request->hr_type)
        {
            Target::create([
                'status' => $request->changeStatus,
                'due_date' => $request->duedate,
                'blog' => $request->blogs,
                'social_media' => $request->social_media,
                'website' => $request->website,
                'apps' => $request->apps,
                'total_of_target' => $total,
                'user_id' => $request->employee,
                'role' => $request->role,
                'hr_type' => $request->hr_type
            ]);
            
        }
        else{
            Target::create([
                'status' => $request->changeStatus,
                'due_date' => $request->duedate,
                'blog' => $request->blogs,
                'social_media' => $request->social_media,
                'website' => $request->website,
                'apps' => $request->apps,
                'total_of_target' => $total,
                'user_id' => $request->employee,
                'role' => $request->role
            ]);
        }
        
        
    }

    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('target',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function show(Request $request)
    {
        // dd($request->user);
        if($request->user)
        {
            $data = DB::table('targets')->where('targets.user_id', '=', $request->user)->get();
            return view('target.create',compact('data'));
            
        }
        else
        {
            $data = DB::table('targets')
            ->join('users', 'targets.user_id', '=', 'users.id')
            ->select('targets.*', 'users.name')
            ->get();
        return view('target.create',compact('data'));
        }
    }
}
