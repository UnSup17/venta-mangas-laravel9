@extends("layouts.app")
@section("content")
<section class="container dialog-content">
    <section class="modal-body d-flex">
        <section class="card ms-2 rellenar-espacio">
            <section class="pb-1">
                <section class="mt-4 mb-4 item-car">
                    @php
                        $carrito_array_items = session()->get('car')->items;
                    @endphp
                    {{-- @if(empty($carrito_array_items))
                        <section class="mensaje-carrito-vacio">
                            <section>Carrito vacio</section>
                        </section>
                    @else --}}
                        @foreach ($carrito_array_items as $item_in_car)
                            {{-- @php
                                $flag = false;
                                if(array_key_exists($item->id, session()->get('car'))) $flag = true
                            @endphp --}}
                            <section class="d-flex info-tomo">
                                <section class="miniatura-tomo-carrito">
                                    <img src="{{$item_in_car->tome->manga->url_portrait}}" alt="Portada_manga">
                                </section>
                                <section class="grey col-md-2 text-left">
                                    Capítulo: {{ $item_in_car->tome->number_tome }}
                                </section>
                                <section class="grey col-md-2 text-left">
                                    <i class="fa-solid fa-dollar-sign"></i>
                                    Precio: {{ $item_in_car->tome->price }}
                                </section>

                                <form class="grey col-md-4 text-right strong" method="GET"
                                    action="{{ route('edit_item', ['id' => $item_in_car->id]) }}">
                                    @csrf
                                    <i class="fa-solid fa-list-ul"></i>
                                    Cantidad:
                                    <input class="input-cantidad" type="number" name="item_quantity"
                                        value= '{{$item_in_car->quantity}}'
                                        min="1" max="12">
                                    <input type="hidden" name="item_id" value="{{ $item_in_car->id }}">
                                    <button type="submit" class="boton-carrito boton-editar btn">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        Editar
                                    </button>
                                </form>

                                <section class="grey col-md-2 text-left">
                                    <a class="boton-carrito boton-eliminar btn" href="{{ route('remove_item', ['id'=>$item_in_car->id]) }}">
                                        <i class="fa-solid fa-times"></i>
                                        Eliminar
                                    </a>
                                </section>
                            </section>
                        @endforeach
                    {{-- @endif --}}
                </section>
                <section class="container centrar mb-4">
                    <section class="grey col-md-2 text-left">
                        <a class="boton-carrito boton-eliminar-carro btn" href="{{ route('delete_car') }}">
                            <i class="fa-solid fa-trash"></i>
                            Eliminar Carrito
                        </a>
                    </section>
                </section>
            </section>
        </section>
        <section>
            <section class="card info-carrito">
                <section>
                    Resumen del pedido
                </section>
                <section class="resumen-orden">
                    <table>
                        <tbody>
                            <tr>
                                <td>Productos</td>
                                <td>${{ $valor_productos }}</td>
                            </tr>
                            <tr>
                                <td>Costo envío</td>
                                <td>${{ $valor_envio }}</td>
                            </tr>
                            <tr>
                                <td>Subtotal sin impuestos</td>
                                @php
                                    $subtotal = $valor_productos + $valor_envio
                                @endphp
                                <td>${{ $subtotal }}</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                @php
                                    $total = number_format(($valor_productos + $valor_envio) * 1.19, 2);
                                @endphp
                                <td>${{ $total }}</td>
                            </tr>
                        </tbody>
                    </table>
                </section>
                <section>
                    <button class="boton-pagar">
                        <a href="{{ route('car_checkout', ['total' => $total, 'subtotal' => $subtotal])}}">
                            Pagar
                        </a>
                    </button>
                </section>
            </section>
        </section>
    </section>
</section>
@endsection
