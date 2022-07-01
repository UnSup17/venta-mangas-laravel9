<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Manga;

class Author extends Model
{
    use HasFactory;

    public function mangas() {
        return $this->belongsToMany(Manga::class, 'author_manga');
    }

    protected $fillable = [
        'name',
        'last_name',
        'role',
    ];
}
