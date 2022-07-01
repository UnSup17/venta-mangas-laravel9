<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    use HasFactory;

    public function authors() {
        return $this->belongsToMany(Author::class);
    }

    public function genders() {
        return $this->belongsToMany(Gender::class);
    }

    protected $fillable = [
        'name',
        'url_portrait',
        'state',
        'published_at',
        'periodicity',
        'synopsis',
    ];
}
