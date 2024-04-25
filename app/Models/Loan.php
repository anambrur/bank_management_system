<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function loanType()
    {
        return $this->belongsTo(LoanType::class);
    }
    function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    function loanProposal()
    {
        return $this->belongsTo(LoanProprosal::class);
    }
}
