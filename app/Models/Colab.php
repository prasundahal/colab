<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colab extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'first_question',
        'second_question',
        'image1',
        'number',
        'state',
        'email',
        'image2',
        'third_question',
        'fourth_question',
        'fifth_question',
        'note',
        'r_id',
        'ip',
        'trackrecord',
    ];
}
