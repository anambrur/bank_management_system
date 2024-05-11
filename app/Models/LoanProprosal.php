<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanProprosal extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    function loanType()
    {
        return $this->belongsTo(LoanType::class);
    }
    function loan()
    {
        return $this->hasMany(Loan::class);
    }
}
