<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Gender;
use App\Models\Manga;

class InicioController extends Controller
{
    function home (Request $request) {
        $genders = Gender::all();
        $data = $request->all();
        var_dump($data);
        $conditions = '';
        foreach ($data as $key => $value) {
            if (str_contains($key, 'gender')) {
                $conditions.='enum_gender = '.$value. ' and ';
            }
        }
        $conditions = substr($conditions, 0, -5);
        var_dump($conditions);
        // if (is_null($gender)) {
            return view("home", ["genders" => $genders, "catalogo" => Manga::all()]);
        // }
        // $id = DB::table('genders')->where('enum_gender', $gender)->get();
        // $catalogo = Gender::find($id[0]->id);
        // return view("home", ["genders" => $genders, "catalogo" => $catalogo->mangas]);
    }
}
