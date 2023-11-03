<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Title;
use App\Models\Branch;
use App\Models\Counter;
use App\Models\UserLog;
use App\Models\Currency;
use App\Models\Interval;
use App\Models\TransferType;
use Illuminate\Http\Request;
use App\Models\TransferStatus;
use App\Http\Resources\CardCollection;
use App\Http\Resources\TitleCollection;
use App\Http\Resources\BranchCollection;
use App\Http\Resources\CounterCollection;
use App\Http\Resources\UserLogCollection;
use App\Http\Resources\CurrencyCollection;
use App\Http\Resources\IntervalCollection;
use App\Http\Resources\TransferTypeCollection;
use App\Http\Resources\TransferStatusCollection;

class MiscController extends Controller
{
    //
    public function all_misc(){
        $data = [
            "currencies"        =>  new CurrencyCollection((Currency::all())),
            "branches"          =>  new BranchCollection((Branch::all())),
            "intervals"         =>  new IntervalCollection((Interval::all())),
            "titles"            =>  new TitleCollection((Title::all())),
            "cards"            =>   new CardCollection((Card::all())),
            "counters"          =>  new CounterCollection((Counter::all())),
            "userLogs"          =>  new UserLogCollection((UserLog::all())),
            "transferTypes"     =>  new TransferTypeCollection((TransferType::all())),
            "transferStatus"    =>  new TransferStatusCollection((TransferStatus::all())),
        ];
        return response()->json($data,201);
    }
}
