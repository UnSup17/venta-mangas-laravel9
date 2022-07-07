@extends('layouts.app')
@section('content')
    <section class="container dialog-content">
        <section class="card">
            @if (session('success'))
                <div class="alert alert-success alert-block m-0">
                    <button onclick="this.parentElement.style.display = 'none'" id="alert-btn" data-dismiss="alert" class="btn position-absolute top-50 translate-middle end-0">
                        <i class="fa-solid fa-times"></i>
                    </button>
                    <strong>{{ session('success') }}</strong>
                </div>
                @php
                    session()->forget('success');
                @endphp
            @endif
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
                            @foreach ($lista_tomos as $item)
                                @php
                                    $flag = false;
                                    $car = session()->get('car');
                                    if (null !== $car) {
                                        foreach ($car as $posicion => $tomo) {
                                            if($tomo->id == $item->id) {
                                                $flag = true;
                                                $cantidad = $tomo->cantidad;
                                            }
                                        }
                                    }
                                @endphp
                                <div class="d-flex info-tomo">
                                    <div class="grey col-md-2 text-left strong">Capítulo: {{ $item->number_tome }}</div>
                                    <div class="grey col-md-2 text-left">
                                        <i class="fa-solid fa-list-ul"></i>
                                        Páginas: {{ $item->number_pages }}
                                    </div>
                                    <div class="grey col-md-3 text-left">
                                        <i class="fa-solid fa-dollar-sign"></i>
                                        Precio: {{ $item->price }}
                                    </div>
                                    <form class="grey col-md-5 text-right strong" method="POST"
                                        action="{{ route('add_item', ['manga' => $info_manga->name, 'id' => $item->id]) }}">
                                        @csrf
                                        @if($flag)
                                            <a class="boton-carrito boton-eliminar btn" href="{{ route('remove_item', ['id'=>$item->id]) }}">
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
                                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                                    </form>
                                </div>
                            @endforeach
                        </section>
                        <br>
                        <a class="boton-carrito boton-eliminar btn" href="{{ route('delete_car') }}">
                            <i class="fa-solid fa-times"></i>
                            Eliminar Carrito
                        </a>
                    </section>
                </section>
            </section>
        </section>
    </section>
@endsection
