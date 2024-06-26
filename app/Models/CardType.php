<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardType extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function card()
    {
        return $this->hasMany(Card::class);
    }
}
