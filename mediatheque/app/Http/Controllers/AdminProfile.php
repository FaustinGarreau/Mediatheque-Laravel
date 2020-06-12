<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Resource;
use App\Loaning;

class AdminProfile extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $resources = DB::table("resource")->get();
        $types = DB::table("type")->get();
        $categories = DB::table("category")->get();
        
        foreach ($resources as $resource) {
            var_dump($resource);
        }

        return view('admin/index', ["resources" => $resources, "types" => $types, "categories" => $categories, "user" => $user]);
    }
}
