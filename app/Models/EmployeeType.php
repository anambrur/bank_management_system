<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    function employee()
    {
        return $this->hasMany(Employee::class);
    }
}
