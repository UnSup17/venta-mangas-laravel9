<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use App\Models\Tome;
use Illuminate\Http\Request;

class TomesController extends Controller
{
    function list($id) {
        return view("crud.biblioteca_tomos", ["info_tomos" => Manga::find($id)]);
    }

    function form_add($id) {
        return view("crud.form_add_tomo", ['info_manga' => Manga::find($id)]);
    }
    function add($id, Request $request) {
        $data = $request->all();
        Tome::create([
            "id" => $id.'0'.$data["number_tome"],
            "number_tome" => $data["number_tome"],
            "number_pages" => $data["number_pages"],
            "published_at" => $data["published_at"],
            "price" => $data["price"],
            "manga_id" => intval($id)
        ]);
        return back();
    }

    function form_update($id) {
        return view("crud.form_update_tomo", ['info_tomo' => Tome::find($id)]);
    }
    function update($id, Request $request) {
        $data = $request->all();
        $tome_updated = Tome::find($id);
        $tome_updated->number_tome = $data["number_tome"];
        $tome_updated->number_pages = $data["number_pages"];
        $tome_updated->published_at = $data["published_at"];
        $tome_updated->price = $data["price"];
        $tome_updated->save();
        return redirect()->route('administrartomos', ['id' => $tome_updated->manga->id]);
    }

    function delete($id) {
        $id_manga = Tome::find($id)->manga->id;
        Tome::destroy($id);
        return redirect()->route('administrartomos', ['id' => $id_manga]);
    }
}
