<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Manga;

class Gender extends Model
{
    use HasFactory;

    public function mangas() {
        return $this->belongsToMany(Manga::class, 'gender_manga');
    }

    protected $fillable = [
        'enum_genero',
    ];
}
