<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dan extends Model
{
    use HasFactory;

    protected $table = 'dani';

    protected $fillable = ['nazivDana'];
}
