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
                    </section>
                    <section class="px-3">
                        <section>
                            <b>Sinopsis:</b><br>{{ $info_manga->synopsis }}<br><br>
                        </section>
                        <section>
                            @foreach ($lista_tomos as $item)
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
                                        action="{{ route('add_item', ['manga' => $info_manga->name, 'id' => $info_manga->id]) }}">
                                        @csrf
                                        <button type="submit" class="boton-carrito">
                                            <i class="fa-solid fa-basket-shopping"></i>
                                            Agregar
                                        </button>
                                        <input class="input-cantidad" type="number" name="item_quantity" value="1"
                                            min="1" max="12">
                                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                                    </form>
                                </div>
                            @endforeach
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
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
@endsection
