<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Tome extends Model
{
    use HasFactory;

    public function manga()
    {
        return $this->belongsTo(Manga::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'item_id');
    }

    protected $fillable = [
        'id',
        'number_tome',
        'published_at',
        'number_pages',
        'price',
        'manga_id'
    ];

    public static function get_ids_carrito(Request $request) {
        $lista_ids = [];
        $carrito = $request->session()->get('car');
        foreach ($carrito as $key => $value) {
            array_push($lista_ids, $key);
        }
        return self::find($lista_ids)->get();
    }
}
