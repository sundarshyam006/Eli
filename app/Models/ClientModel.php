<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientModel extends Model
{
    use HasFactory;

    protected $table = 'Client';

    protected $fillable = [
        'clientName',
        'modeOfAccess',
        'email',
        'email_verified_at',
        'mobile',
        'moble_verified_at',
        'password',
    ];

    protected $hidden = [
        'password'
    ];

}
