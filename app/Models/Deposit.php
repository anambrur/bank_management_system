<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function depositType()
    {
        return $this->belongsTo(DepositType::class);
    }
    function interest()
    {
        return $this->belongsTo(Interest::class);
    }
    function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
