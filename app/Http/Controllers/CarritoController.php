<?php

namespace App\Http\Controllers;

use App\Models\Tome;
use App\Models\Bill;
use App\Models\Item;
use App\Models\Car;
use App\Models\Register;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    function add_item($id, Request $request) {
        if(!session()->has('user')) {
            $request->session()->put('warning', 'Debes iniciar sesion para agregar items a un carrito');
            return redirect()->route('form_login');
        }
        $data = $request->all();
        Item::create([
            'quantity' => intval($data['item_quantity']),
            'car_id' => $request->session()->get('car')->id,
            'tome_id' => $id
        ]);
        $request->session()->put('car', Car::find($request->session()->get('car')->id));
        $request->session()->put('success', 'Agregado correctamente');
        return back();
    }

    function list(Request $request) {
        $carrito_array_items = $request->session()->get('car')->items;
        if (count($carrito_array_items) == 0){
            $request->session()->put('warning', 'Carrito vacío, añada items');
            return back();
        }
        $valor_productos = 0.0;
        $valor_envio = 0;
        foreach ($carrito_array_items as $item_in_car) {
            $valor_productos += ($item_in_car->quantity * $item_in_car->tome->price);
        }
        return view("car_checkout", [
            "valor_productos"=>$valor_productos,
            "valor_envio"=>$valor_envio
        ]);
    }

    function edit_item($id, Request $request) {
        $data = $request->all();
        $item_to_edit = Item::find($id);
        $item_to_edit->quantity = $data['item_quantity'];
        $item_to_edit->save();
        $request->session()->put('car', Car::find(session()->get('car')->id));
        $request->session()->put('success', 'Cantidad actualizada correctamente');
        return back();
    }

    function remove_item($id, Request $request) {
        Item::destroy($id);
        $request->session()->put('car', Car::find(session()->get('car')->id));
        $request->session()->put('success', 'Eliminado correctamente');
        return back();
    }

    function delete_car(Request $request) {
        foreach ($request->session()->get('car')->items as $item_in_car) {
            Item::destroy($item_in_car->id);
        }
        $request->session()->put('car', Car::find(session()->get('car')->id));
        $request->session()->put('success', 'Carrito eliminado');
        return redirect()->route('home');
    }

    function car_checkout(Request $request) {
        $data = $request->all();
        $usuario_id = $request->session()->get('user')[0]->id;
        $id_factura = intval(strval($usuario_id).date('dmoGis'));
        $carrito_array_items = $request->session()->get('car')->items;

        Bill::create([
            'id' => $id_factura,
            'subtotal' => $data['subtotal'],
            'total' => $data['total'],
            'user_id' => $usuario_id
        ]);

        foreach ($carrito_array_items as $item_in_car) {
            Register::create([
                'quantity' => $item_in_car->quantity,
                'tome_id' => $item_in_car->tome->id,
                'bill_id' => $id_factura,
            ]);
        }

        foreach ($carrito_array_items as $item_in_car) {
            Item::destroy($item_in_car->id);
        }
        $request->session()->put('car', Car::find(session()->get('car')->id));
        $request->session()->put('success', 'Compra registrada');
        return redirect()->route('home');
    }
}
