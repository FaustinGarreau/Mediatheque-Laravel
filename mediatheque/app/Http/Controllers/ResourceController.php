<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Resource;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Stock;
use App\Loaning;
use Illuminate\Http\Request;

class ResourceController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resource/create');
    }
    
    public function takeResource(Resource $resource, $id)
    {

        $maxLoaning = DB::table('loaning')->where('user_id', Auth::user()->id)->get();
        if (count($maxLoaning) >= 4) {
            var_dump("t'es au max");
        } else {
            $existResource = DB::table('resource')->where('id', $id)->value('id');

            if ($existResource) {
                $existLoaning = DB::table('loaning')->where('user_id', Auth::user()->id)->where('resource_id', $id)->value('id');

                if (!$existLoaning) {
                    $loaning = new Loaning;

                    $loaning->resource_id = $id;
                    $loaning->user_id = Auth::user()->id;

                    $loaning->save();
                    
                    Stock::where('resource_id', $existResource)->decrement('rest');
                    return redirect()->route('admin');
                    die;
                } else {
                    return redirect()->route('admin');
                    die;
                }
            } else {
                return redirect()->route('admin');
                die;
            }
        }

        return redirect()->route('admin');
    }

    public function removeResource(Resource $resource, $id)
    {
        $existResource = DB::table('resource')->where('id', $id)->value('id');

        if ($existResource) {
            $existLoaning = DB::table('loaning')->where('user_id', Auth::user()->id)->where('resource_id', $id)->value('id');

            if (!$existLoaning) {
                return redirect()->route('admin');
                die;
            } else {
                DB::table('loaning')->where('user_id', Auth::user()->id)->where('resource_id', $id)->delete();
                
                Stock::where('resource_id', $existResource)->increment('rest');
                return redirect()->route('admin');
                die;
            }
        } else {
            return redirect()->route('admin');
            die;
        }
        return redirect()->route('admin');
        die;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre' => 'required',
            'content' => 'required',
            'author' => 'required',
            'additional_info' => '',
            'date' => 'required',
            'addStock' => 'required|min:1|max:9'
        ]);

        $alreadyCreated = DB::table('resource')->where('titre', $validatedData['titre'])->where('author', $validatedData['author'])->value('id');

        if (!$alreadyCreated) {
            $resource = new Resource;

            $resource->titre = $request->titre;
            $resource->content = $request->content;
            $resource->author = $request->author;
            $resource->additional_info = $request->additional_info;
            $resource->date = $request->date;

            $resource->save();

            $idResource = DB::table('resource')->where('titre', $validatedData['titre'])->where('author', $validatedData['author'])->value('id');

            $stock = new Stock;

            $stock->resource_id = $idResource;
            $stock->total = $request->addStock;
            $stock->rest = $request->addStock;

            $stock->save();
        } else {
            Stock::where('resource_id', $alreadyCreated)->increment('total', $validatedData["addStock"]);
            Stock::where('resource_id', $alreadyCreated)->increment('rest', $validatedData["addStock"]);
        }

        return redirect()->route('resource.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function show(Resource $resource)
    {
        return view('resource/show', compact('resource'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function edit(Resource $resource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resource $resource)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resource $resource)
    {
        //
    }
}
