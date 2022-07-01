<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tome extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'number_tome',
        'published_at',
        'number_pages',
        'price',
    ];
}
