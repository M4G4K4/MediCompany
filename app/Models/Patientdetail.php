<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patientdetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fullName',
        'age',
        'sex',
        'NIF'
    ];
}
