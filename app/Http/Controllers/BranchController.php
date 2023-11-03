<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Resources\BranchCollection;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $branch = Branch::all();
        if($branch->count() != 0 ){
            return new BranchCollection($branch);
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
            $state_save = Branch::create([
                "BranchId"  => $dt->BranchId,
                "BranchName" => $dt->BranchName,
                "BranchZone" => $dt->BranchZone
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
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        //
    }
}
