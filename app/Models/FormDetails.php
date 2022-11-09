<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormDetails extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'form_id',
        'email',
        'phone',
    ];

    public function form(){
        return $this->hasOne(FormNumber::class,'id','form_id');
    }
}
