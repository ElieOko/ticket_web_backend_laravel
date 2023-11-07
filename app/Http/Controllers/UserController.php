<?php

namespace App\Http\Controllers;

//use auth;

use JWTAuth;
use session;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserCollection;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $user = User::all();
        if($user->count() != 0 ){
            return new UserCollection($user);
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
    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'UserName' => 'required',
                'Password' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }
            $data = json_decode($request->getContent());
            $user = User::where("UserName",$data->UserName)->first();
            if (!$user){
                return response()->json(["message"=>"Identifiant non valide"], 422);
            }  
            $user = User::where('UserName',$data->UserName)->first();
            if(!$user || !Hash::check($data->Password, $user->Password)){
                return response()->json(
                    [
                        "message"=>"Mot de passe invalide"
                    ],404
                );
            }
            
            //cookie("jwt",$token,60 * 48);
            return response(auth()->user(),201);

        } catch (\Throwable $th) {
            $response = ['message' => $th->getMessage()]; 
            return  $response;
        }
    }

    public function store(Request $request)
    {
        $msg = "Enregistrement réussie avec succès";
        $status = 201;
        $data = json_decode($request->getContent());
            $state_save = User::create([
                "BranchFId"         =>  $data->BranchFId,
                'UserName'          =>  $data->UserName,
                'FullName'          =>  $data->FullName, 
                'AccessLevel'       =>  $data->AccessLevel,
                'Locked'            =>  $data->Locked,
                'Password'          =>  bcrypt($data->Password)
            ]);
            $token = JWTAuth::fromUser($state_save);
            if(!$state_save){
                $msg = "Echec de l'enregistrement";
                $status = 400;
            }
            $update_data = ['AccessToken' => $token]; 
            //$cookie = cookie("jwt",$token,60 * 48);
            // //$log = UserLogController::store(
            //     [
            //     "UserFId"           =>$state_save->UserId,
            //     "ClientType"        =>$data->ClientType,
            //     "ClientIpAddress"   =>$data->ClientIpAddress,
            //     "AccessType"        =>$data->AccessType
            //     ]
            //     );
            $user = User::where('UserName',$data->UserName)->update($update_data);
            $response = [
                'user' => $user,
                'token' => $token 
            ];
            return response()->json([
                "message"=>$msg,
                "token"=>$token
            ],$status);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
