<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    function account()
    {
        return $this->hasMany(Account::class);
    }

    function customer()
    {
        return $this->hasMany(Customer::class);
    }

    function interest()
    {
        return $this->hasMany(Interest::class);
    }

}
