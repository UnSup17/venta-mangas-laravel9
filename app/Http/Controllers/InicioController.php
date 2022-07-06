<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Gender;
use App\Models\Manga;

class InicioController extends Controller
{
    function home(Request $request)
    {
        $genders = Gender::all()->sortBy('enum_gender');
        $conditions = $request->all();
        if (isset($conditions['manga_name'])) {
            return view("home", [
                "genders" => $genders,
                "catalogo" => Manga::where('name', 'like', '%'.$conditions['manga_name'].'%')->get()
            ]);
        }
        if (empty($conditions) || $conditions['selected_id'] == 'limpiar') {
            return view("home", [
                "genders" => $genders,
                "catalogo" => Manga::all(),
            ]);
        }
        return view("home", [
            "genders" => $genders,
            "catalogo" => $genders[$conditions['selected_id']-1]->mangas()->get(),
            "filtrado" => $conditions['selected_id']
        ]);
    }
}
