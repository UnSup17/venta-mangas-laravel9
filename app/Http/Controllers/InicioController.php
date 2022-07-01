<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Gender;
use App\Models\Manga;

class InicioController extends Controller
{
    function home ($gender = null) {
        $genders = DB::table('genders')->get();
        if ($gender == null) {
            $catalogo = DB::table('mangas')->get();
        } else {
            $id = DB::table('genders')->where('enum_gender', $gender)->get();
            $catalogo = Gender::find($id[0]->id);
            // $catalogo = $catalogo->genders()->where('enum_gender', $gender)->get();
        }
        return view("home", ["genders" => $genders, "catalogo" => $catalogo->mangas]);
    }
}
