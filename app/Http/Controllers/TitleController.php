<?php

namespace App\Http\Controllers;

use App\Models\Title;
use Illuminate\Http\Request;
use App\Http\Resources\TitleCollection;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = Title::all();
        if($title->count() != 0 ){
            return new TitleCollection($title);
        }
        return response()->json([
            "message"=>"Ressource not found",
        ],400);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function filter()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $msg = "Enregistrement réussie avec succès";
        $status = 201;
        $data = json_decode($request->getContent());
        foreach ($data as $dt) {
            # code...
            $state_save = Title::create([
                'TitleName'     =>  $dt->TitleName,
                'DisplayName'   =>  $dt->DisplayName
            ]);
            
            if(!$state_save){
                $msg = "Echec de l'enregistrement";
                $status = 400;
            }
        }
            
            return response()->json([
                "message"=>$msg,
            ],$status);
    }

    /**
     * Display the specified resource.
     */
    public function show(Title $title)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Title $title)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Title $title)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Title $title)
    {
        //
    }
}
