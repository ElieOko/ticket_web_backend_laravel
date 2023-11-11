<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Ticket;
use App\Models\Interval;
use App\Models\TransferType;
use Illuminate\Http\Request;
use App\Http\Resources\TicketCollection;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ticket = Ticket::with('user.branch','currency','transferType',"transferStatus")->orderBy('TicketId', 'desc')->get();
        if($ticket->count() != 0 ){
            return new TicketCollection($ticket);
        }
        return response()->json([
            "message"=>"Ressource not found",
        ],400);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function filter(Request $request)
    {
        $ticket =Ticket::query()
        ->when(request('TransferStatusFId'), function ($q) {
            return $q->where('TransferStatusFId', request('TransferStatusFId'));
        })
        ->when(request('TransferTypeFId'), function ($q) {
            return $q->where('TransferTypeFId', request('TransferTypeFId'));
        })
        ->when([request('dateFrom'),request('dateTo')], function ($q) {
            return $q->whereBetween('DateCreated', [request('dateFrom'),request('dateTo')],);
        })->with('user.branch','currency','transferType',"transferStatus")->orderBy('TicketId', 'desc')->get();
        if($ticket->count() != 0 ){
            return new TicketCollection($ticket);
        }
        return response()->json([
            "message"=>"Ressource not found",
        ],400);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $numberTicket       = 0;
        $msg                = "Enregistrement réussie avec succès";
        $status             = 201;
        $data               = json_decode($request->getContent());
        $interval           = Interval::where("TransferTypeFId", $data->TransferTypeFId)->where("CurrencyFId", $data->CurrencyFId)->get();
        $check              = Ticket::value_between($data->Amount,$interval); 
        return response()->json([
            "message"=> $check 
        ],$status); 
        if($check["status"]){
            $date            = new DateTime();
            $current_day     = $date->format("Y-m-d");
            $ticket          = Ticket::where("TransferTypeFId", $data->TransferTypeFId)->where("CurrencyFId", $data->CurrencyFId)->get();
            $min             = count($ticket) > 0 ? count($ticket) - 1 : $check["min"];
            $numberTicket    = count($ticket) > 0 ? ++$ticket[$min]->TicketId : $check["min"];
            $name            = (TransferType::where("TransferTypeId",$data->TransferTypeFId)->first())->DisplayName." ".$numberTicket;
            $state_save = Ticket::create([
                'TicketId'          =>  $numberTicket,
                'Amount'            =>  $data->Amount,
                'Name'              =>  $name,
                'CurrencyFId'       =>  $data->CurrencyFId,
                'Phone'             =>  $data->Phone,
                'TransferTypeFId'   =>  $data->TransferTypeFId,
                'UserFId'           =>  auth()->user()->UserId,
                'TransferStatusFId' =>  1, 
                'Motif'             =>  $data->Motif,
                'DateCreated'       =>  $current_day
            ]);
            if(!$state_save){
                $msg = "Echec de l'enregistrement";
                $status = 400;
            }
        }
        $ticket = Ticket::where('TicketId', $numberTicket)->with('user.branch','currency','transferType',"transferStatus")->orderBy('TicketId', 'desc')->get();
        return response()->json([
            "message"=>$msg,
            "ticket"=> new TicketCollection($ticket)
        ],$status);
    }
    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id)
    {
        //
        $data               = json_decode($request->getContent());
        $ticket             = Ticket::find($id);
        $current_cloture    = date("Y-m-d H:i:s");
        $cloture_date       = $ticket->TransferStatusFId != 3 || $ticket->TransferStatusFId != 4 ? $current_cloture:"";
        $update_data        = [
                                'Amount'                =>  (int)$data->Amount,
                                'TransferStatusFId'     =>  $ticket->TransferStatusFId,
                                'Phone'                 =>  $data->Phone, 
                                'Note'                  =>  $data->Note,
                                'ClotureDateCreated'    =>  $cloture_date
                                ];
        $ticket->update($update_data);
        $response =[
            'message'=>"Success"
        ];
        return response($response,201);
    }

    public function close_ticket(Request $request)
    {
        //
        $data               = json_decode($request->getContent());
        $ticket_name        = $data->TicketId;
        $message            = "Echec: Aucun ticket avec le numéro $ticket_name";
        $ticket             = Ticket::find((int)$data->TicketId);
        if($ticket){
            $date               = new DateTime();
            $current_cloture    = $date->format("Y-m-d H:i:s");
            //$cloture_date       = $ticket->TransferStatusFId != 3 || $ticket->TransferStatusFId != 4 ? $current_cloture:"";
            $update_data        = [
                                    'TransferStatusFId'     =>  3,
                                    'ClotureDateCreated'    =>  $current_cloture,
                                    'Motif'                 =>  $data->Motif,
                                    ];
            $ticket->update($update_data);
            $message            = "Le ticket $ticket_name vient d'être cloturé avec succès";
        }
        $response =[
            'message'=>$message
        ];
        return response($response,201);
    }
    public function call_ticket(Request $request){
        $data               = json_decode($request->getContent());
        $ticket_name        = $data->Ticket;
        $message            = "Echec: Aucun ticket avec le numéro $ticket_name";
        $ticket             = Ticket::find((int)$data->Ticket);
        if($ticket){
            $date               = new DateTime();
            $current_cloture    = $date->format("Y-m-d H:i:s");
            //$cloture_date       = $ticket->TransferStatusFId != 3 || $ticket->TransferStatusFId != 4 ? $current_cloture:"";
            $update_data        = [
                                    'TransferStatusFId'     => 2,
                                    'Note'                  => $data->Note
                                    ];
            $ticket->update($update_data);
            $message            = "Le ticket $ticket_name est en attente";
        }
        $response =[
            'message'=>$message
        ];
        return response($response,201);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
        $data               = json_decode($request->getContent());
        $ticket_name        = $data->TicketId;
        $message            = "Echec: Aucun ticket avec le numéro $ticket_name";
        $ticket             = Ticket::find((int)$data->TicketId);
        if($ticket){
            $date               = new DateTime();
            $current_cloture    = $date->format("Y-m-d H:i:s");
            //$cloture_date       = $ticket->TransferStatusFId != 3 || $ticket->TransferStatusFId != 4 ? $current_cloture:"";
            $update_data        = [
                                    'TransferStatusFId'     =>  $ticket->TransferStatusFId,
                                    'ClotureDateCreated'    =>  $current_cloture,
                                    'Motif'                 =>  $data->Motif,
                                    ];
            $ticket->update($update_data);
            $message            = "Le ticket $ticket_name vient d'être cloturé avec succès";
        }
        $response =[
            'message'=>$message
        ];
        return response($response,201);
    }
    public function destroy(Ticket $ticket)
    {
        //
    }
}
