<?php

namespace App\Http\Controllers;

use App\Models\Call;
use Illuminate\Http\Request;
use App\Http\Resources\CallCollection;

class CallController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $call = Call::all();
        if($call->count() != 0 ){
            return new CallCollection($call);
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
        $current_day = date("Y-m-d H:i:s");
        $data = json_decode($request->getContent());
            $state_save = Call::create([
                "Ticket"        =>  $data->Ticket,
                "Note"          =>  $data->Note,
                "CounterFId"    =>  $data->CounterFId,
                "UserFId"       =>  $data->UserFId,
                "CreatedTime"   =>  $current_day
            ]);
            if(!$state_save){
                $msg = "Echec de l'enregistrement";
                $status = 400;
            }
            return response()->json([
                "message"=>$msg,
            ],$status);
    }
    /**
     * Display the specified resource.
     */
    public function show(Call $call)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Call $call)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Call $call)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Call $call)
    {
        //
    }
}
