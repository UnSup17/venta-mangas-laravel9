<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Manga;

class MangasController extends Controller
{
    function list()
    {
        $list_mangas = DB::table('mangas')->select('*')->get();
        return view("crud.biblioteca", ["list_mangas" => $list_mangas]);
    }

    function form_create()
    {
        return view("crud.form_create_manga");
    }
    function create(Request $request)
    {
        $data = $request->all();
        Manga::create([
            "name" => $data["name"],
            "url_portrait" => $data["url_portrait"],
            "state" => $data["state"],
            "published_at" => $data["published_at"],
            "periodicity" => $data["periodicity"],
            "synopsis" => $data["synopsis"],
        ]);
        return redirect()->route('mangas');
    }

    function read($id, $manga)
    {
        $info_manga = DB::table('mangas')->where('id', $id)->first();
        $info_manga->published_at = explode("-", $info_manga->published_at)[0];
        return view("crud.read_manga", ["info_manga" => $info_manga]);
    }

    function form_update($id, $manga)
    {
        $info_manga = DB::table('mangas')->where('id', $id)->first();
        return view("crud.form_update_manga", ["info_manga" => $info_manga]);
    }
    function update(Request $request)
    {
        $data = $request->all();
        $ret = DB::table("mangas")->where('id', $data['id'])->update([
            "name" => $data["name"],
            "url_portrait" => $data["url_portrait"],
            "state" => $data["state"],
            "published_at" => $data["published_at"],
            "periodicity" => $data["periodicity"],
            "synopsis" => $data["synopsis"]
        ]);
        if ($ret) {
            $mensaje = "Se actualizó con éxito";
        } else {
            $mensaje = "No se pudo actualizar";
        }
        return redirect()->route('mangas')->with('info', $mensaje);
    }

    function delete($id, $manga)
    {
        $ret = DB::table("mangas")->where("id", $id)->delete();
        if ($ret) {
            $mensaje = "Se elimino con éxito";
        } else {
            $mensaje = "No se pudo eliminar";
        }
        return redirect()->route('mangas')->with('info', $mensaje);
    }
}
