<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormNumber extends Model
{
    use HasFactory;
    
    protected $table = 'formnumbers';
    
    protected $fillable = [
        'details',
        'phone_number',
        'name',
        'email',
        'note',
        'session_id'
    ];
}
