<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presc_drugs extends Model
{
    use HasFactory;

    protected $fillable = ['drug_id', 'presc_id'];
}
