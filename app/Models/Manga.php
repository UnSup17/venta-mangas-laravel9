<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Gender;

class Manga extends Model
{
    use HasFactory;

    public function authors() {
        return $this->belongsToMany(Author::class, 'author_manga');
    }

    public function genders() {
        return $this->belongsToMany(Gender::class, 'gender_manga');
    }

    public function tomes() {
        return $this->hasMany(Tome::class);
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
