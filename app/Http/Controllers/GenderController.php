<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Gender;

class GenderController extends Controller
{
    function list()
    {
        $genders = DB::table('Gender')->select('*')->get();
        return view("home", ["genders" => $genders]);
    }

    // function form_create()
    // {
    //     return view("crud.form_create_manga");
    // }
    // function create(Request $request)
    // {
    //     $data = $request->all();
    //     Gender::create([
    //         "enum_gender" => $data["enum_gender"],
    //     ]);
    //     return redirect()->route('home');
    // }

    // function read($id, $manga)
    // {
    //     $info_manga = DB::table('Gender')->where('id', $id)->first();
    //     $info_manga->published_at = explode("-", $info_manga->published_at)[0];
    //     return view("crud.read_manga", ["info_manga" => $info_manga]);
    // }

    // function form_update($id, $manga)
    // {
    //     $info_manga = DB::table('Gender')->where('id', $id)->first();
    //     return view("crud.form_update_manga", ["info_manga" => $info_manga]);
    // }
    // function update(Request $request)
    // {
    //     $data = $request->all();
    //     $ret = DB::table("Gender")->where('id', $data['id'])->update([
    //         "name" => $data["name"],
    //         "url_portrait" => $data["url_portrait"],
    //         "state" => $data["state"],
    //         "published_at" => $data["published_at"],
    //         "periodicity" => $data["periodicity"],
    //         "synopsis" => $data["synopsis"]
    //     ]);
    //     if ($ret) {
    //         $mensaje = "Se actualizó con éxito";
    //     } else {
    //         $mensaje = "No se pudo actualizar";
    //     }
    //     return redirect()->route('Gender')->with('info', $mensaje);
    // }

    // function delete($id, $manga)
    // {
    //     $ret = DB::table("Gender")->where("id", $id)->delete();
    //     if ($ret) {
    //         $mensaje = "Se elimino con éxito";
    //     } else {
    //         $mensaje = "No se pudo eliminar";
    //     }
    //     return redirect()->route('Gender')->with('info', $mensaje);
    // }
}
