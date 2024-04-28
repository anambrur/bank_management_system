<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepositType extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    function deposit()
    {
        return $this->hasMany(Deposit::class);
    }
}
