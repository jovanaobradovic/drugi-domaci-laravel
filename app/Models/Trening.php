<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trening extends Model
{
    use HasFactory;

    protected $table = 'treninzi';

    protected $fillable = ['nazivTreninga'];
}
