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

    function deposit()
    {
        return $this->hasMany(Deposit::class);
    }

    function payment()
    {
        return $this->hasMany(Payment::class);
    }
    
    function withdrawal()
    {
        return $this->hasMany(Withdrawal::class);
    }
    function cashDeposit()
    {
        return $this->hasMany(cashDeposit::class);
    }
}


