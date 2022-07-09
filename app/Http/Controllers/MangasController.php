<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Manga;
use App\Models\Tome;

class MangasController extends Controller
{
    function list(Request $request)
    {
        if (!$request->session()->has('user')){
            $request->session()->put('error', '??? qué intentas?');
                return redirect()->route('home');
        }
        if ($request->session()->get('user')[0]->role != 'admin') {
            $request->session()->put('error', '??? qué intentas?');
            return redirect()->route('home');
        }
        return view("crud.biblioteca", ["list_mangas" => Manga::all()]);
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
        return redirect()->route('admin_mangas');
    }

    function read($id)
    {
        $info_manga = Manga::find($id);
        $info_manga->published_at = explode("-", $info_manga->published_at)[0];
        $lista_tomos = $info_manga->tomes()->orderBy('id', 'desc')->get();
        $creadores = $info_manga->authors()->get();
        $genders = $info_manga->genders()->get();
        return view("crud.read_manga", [
            "info_manga" => $info_manga,
            "lista_tomos"=>$lista_tomos,
            "creadores" => $creadores,
            "genders" => $genders,
        ]);
    }

    function form_update($id)
    {
        return view("crud.form_update_manga", ["info_manga" => Manga::find($id)]);
    }
    function update(Request $request)
    {
        $data = $request->all();

        $this->aux_update_manga_info($data);

        $request->session()->put('success', 'Agregado correctamente');
        return redirect()->route('admin_mangas');
    }

    static function aux_update_manga_info($data) {
        $manga_updated = Manga::find($data['id']);
        $manga_updated->name = $data["name"];
        $manga_updated->url_portrait = $data["url_portrait"];
        $manga_updated->state = $data["state"];
        $manga_updated->published_at = $data["published_at"];
        $manga_updated->periodicity = $data["periodicity"];
        $manga_updated->synopsis = $data["synopsis"];
        $manga_updated->save();
    }

    function delete($id)
    {
        Manga::destroy($id);
        return redirect()->route('admin_mangas')->with('info', "Se elimino con éxito");
    }
}
