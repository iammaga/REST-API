<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'full_name',
        'company_name',
        'phone',
        'email',
        'birthday',
        'photo',
    ];
}
