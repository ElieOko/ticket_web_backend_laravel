<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserLog extends Model
{
    use HasFactory;
    protected $table = "TUserLogs";
    protected $primaryKey = "UserLogId";

    public $timestamps = false;
    protected $fillable = [
        'UserFId',
        'ClientType',
        'ClientIpAddress',
        'AccessType',
        'LogTime'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'UserFId','UserId');
    }
}
