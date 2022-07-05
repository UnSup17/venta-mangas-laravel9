<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Gender;
use App\Models\Manga;

class InicioController extends Controller
{
    function home(Request $request)
    {
        $conditions = $request->all();
        if (empty($conditions) || $conditions['selected_id'] == 'limpiar') {
            return view("home", ["genders" => Gender::all()->sortBy('enum_gender'), "catalogo" => Manga::all()]);
        }
        if (isset($conditions['manga_name'])) {
            return view("home", [
                "genders" => Gender::all()->sortBy('enum_gender'),
                "catalogo" => Manga::where('name', 'like', '%'.$conditions['manga_name'].'%')->get()
            ]);
        }
        return view("home", [
            "genders" => Gender::all()->sortBy('enum_gender'),
            "catalogo" => Gender::find($conditions['selected_id'])->mangas()->get(),
            "filtrado" => $conditions['selected_id']
        ]);
    }
}
