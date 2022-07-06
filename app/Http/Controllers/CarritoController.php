<?php

namespace App\Http\Controllers;

use App\Models\Tome;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    function add_item($id, Request $request) {
        // $data = $request->all();
        // $carrito = $request->session()->get('car');
        // $id = $data['item_id'];
        // $tomo = Tome::find($id)->get()[0];
        // $carrito[Tome::find($id)->get()[0]] = intval($data['item_quantity']);
        // $request->session()->put('car', $carrito);
        // $request->session()->put('success', 'Agregado correctamente');
        var_dump($id);
        $data = Tome::find($id);
        $array = [];
        array_push($array, $data);
        $request->session()->put('car', $array);
        // return back();
    }

    function list() {
        $carrito = session()->get('car');
        $arrays = [];
        foreach ($carrito as $key => $value) {
            array_push(
                $arrays, ['id', '=', $key]
            );
        }
        $items_carrito = Tome::orWhere('id', $carrito)->get();
        return view("car_checkout", [
            "carrito" => $carrito,
            "items_carrito"=>$items_carrito
        ]);
    }

    function remove_item($id, Request $request) {
        $carrito = $request->session()->get('car');
        unset($carrito[$id]);
        $request->session()->put('car', $carrito);
        $request->session()->put('success', 'Eliminado correctamente');
        return back();
    }
}
