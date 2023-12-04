<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patients extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'lastname', 'pesel', 'email', 'doctor_id', 'address_id'];
}
