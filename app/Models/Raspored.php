<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raspored extends Model
{
    use HasFactory;

    protected $table = 'rasporedi';

    protected $fillable = ['danId', 'terminId', 'treningId', 'trener', 'napomena'];
}
