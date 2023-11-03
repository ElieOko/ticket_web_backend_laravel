<?php

namespace App\Models;

use App\Models\User;
use App\Models\TransferType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserPermission extends Model
{
    use HasFactory;
    protected $table = "TUserPermissions";
    protected $primaryKey = "UserPermissionId";

    public $timestamps = false;
    protected $fillable = [
        'UserFId',
        'TransferTypeFId'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'UserFId','UserId');
    }
    public function transfer_type()
    {
        return $this->belongsTo(TransferType::class,'TransferTypeFId','TransferTypeId');
    }
}
