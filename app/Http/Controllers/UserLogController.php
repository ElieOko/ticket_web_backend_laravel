<?php

namespace App\Http\Controllers;

use App\Models\UserLog;
use Illuminate\Http\Request;
use App\Http\Resources\UserLogCollection;

class UserLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_log = UserLog::all();
        if($user_log->count() != 0 ){
            return new UserLogCollection($user_log);
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
    public static function store($request)
    {
        //
        $msg = "Enregistrement réussie avec succès";
        $status = 201;
        $current_day = date("Y-m-d H:i:s");
            $state_save = UserLog::create([
                'UserFId'=> $request['UserFId'],
                'ClientType' => $request['ClientType'],
                'ClientIpAddress' => $request['ClientIpAddress'],
                'AccessType' => $request['AccessType'],
                'LogTime' => $current_day
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
    public function show(UserLog $userLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserLog $userLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserLog $userLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserLog $userLog)
    {
        //
    }
}
