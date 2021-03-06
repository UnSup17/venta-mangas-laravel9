@extends('layouts.app')
@section('content')
    <section class="container dialog-content">
        <section class="card">
            <section class="modal-header">
                <h5 class="modal-title"><b>{{ $info_manga->name }}</b></h5>
            </section>
            <section class="modal-body">
                <section class="d-flex">
                    <section>
                        <section class="portada_manga">
                            <img src="{{ $info_manga->url_portrait }}" alt="caratula_manga">
                        </section>
                        <section><b>Estado: </b>
                            @if ($info_manga->state == 'broadcast')
                                En emisión
                            @else
                                Finalizado
                            @endif
                        </section>
                        <section><b>Fecha: </b>{{ $info_manga->published_at }}</section>
                        <section><b>Periodicidad: </b>{{ $info_manga->periodicity }}</section>
                        <section>
                            <b>Creadores:</b><br>
                            @foreach ($creadores as $creador)
                                {{ '('.$creador->role.') '.$creador->name.' '.$creador->last_name }} <br>
                            @endforeach
                        </section>
                    </section>
                    <section class="px-3">
                        <section>
                            <i class="fa-solid fa-tags"></i>
                            Generos:
                            <section class="d-flex">
                                @foreach ($genders as $gender)
                                    <div class="genero">
                                        <i class="fa-solid fa-tag"></i>
                                        {{ $gender->enum_gender }}
                                    </div>
                                @endforeach
                            </section>
                        </section>
                        <section>
                            <b>Sinopsis:</b><br>{{ $info_manga->synopsis }}<br><br>
                        </section>
                        <section class="lista-overflow">
                            @foreach ($lista_tomos as $tomo)
                                @php
                                    $flag = false;
                                    if (session()->has('car')) {
                                        $carrito_array_items = session()->get('car')->items;
                                        if (count($carrito_array_items) > 0) {
                                            foreach ($carrito_array_items as $item_in_car) {
                                                if ($tomo->id == $item_in_car->tome->id){
                                                    $flag = true;
                                                    $cantidad = $item_in_car->quantity;
                                                    $item_id = $item_in_car->id;
                                                }
                                            }
                                        }
                                    }
                                @endphp
                                <div class="d-flex info-tomo">
                                    <div class="grey col-md-2 text-left strong">Capítulo: {{ $tomo->number_tome }}</div>
                                    <div class="grey col-md-2 text-left">
                                        <i class="fa-solid fa-list-ul"></i>
                                        Páginas: {{ $tomo->number_pages }}
                                    </div>
                                    <div class="grey col-md-3 text-left">
                                        <i class="fa-solid fa-dollar-sign"></i>
                                        Precio: {{ $tomo->price }}
                                    </div>
                                    <form class="grey col-md-5 text-right strong" method="POST"
                                        action="{{ route('add_item', ['manga' => $info_manga->name, 'id' => $tomo->id]) }}">
                                        @csrf
                                        @if($flag)
                                            <a class="boton-carrito boton-eliminar btn" href="{{ route('remove_item', ['id'=>$item_id]) }}">
                                                <i class="fa-solid fa-times"></i>
                                                Eliminar
                                            </a>
                                        @else
                                            <button type="submit" class="boton-carrito boton-agregar btn">
                                                <i class="fa-solid fa-basket-shopping"></i>
                                                Agregar
                                            </button>
                                        @endif
                                        <input class="input-cantidad" type="number" name="item_quantity"
                                            @if($flag)
                                                value= '{{$cantidad}}' disabled
                                            @else
                                                value= '1'
                                            @endif
                                            min="1" max="12">
                                        <input type="hidden" name="item_id" value="{{ $tomo->id }}">
                                    </form>
                                </div>
                            @endforeach
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
@endsection
