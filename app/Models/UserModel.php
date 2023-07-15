<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = "tbl_user";
    protected $fillable = [
        'username',
        'role',
        'password',
        'api_token',
        'active'
    ];
}
