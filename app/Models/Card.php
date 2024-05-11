<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function cardType()
    {
        return $this->belongsTo(CardType::class);
    }
    function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
