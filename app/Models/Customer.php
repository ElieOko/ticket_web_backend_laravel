<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = "TCustomers";
    protected $primaryKey = "customerId";

    public $timestamps = false;
    protected $fillable = [
        'TitleFId',
        'IdCardType1',
        'FirstName',
        'lastName',
        'fatherName',
        'motherName',
        'phoneNumber1',
        'phoneNumber2',
        'email',
        'whatsappNumber',
        'street',
        'city',
        'township',
        'idCardNumber1',
        'idCardExpiryDate1',
        'signature'
    ];

    public function title()
    {
        return $this->belongsTo(Title::class,'CounterFId','CounterId');
    }
}
