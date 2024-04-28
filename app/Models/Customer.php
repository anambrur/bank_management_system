<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function account()
    {
        return $this->hasMany(Account::class);
    }

    function accountType()
    {
        return $this->belongsTo(AccountType::class);
    }

    function loan()
    {
        return $this->hasMany(Loan::class);
    }
}


