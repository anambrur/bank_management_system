<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    function loan()
    {
        return $this->hasMany(Loan::class);
    }
    function loanProposal()
    {
        return $this->hasMany(LoanProprosal::class);
    }
}
