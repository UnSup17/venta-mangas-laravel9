@extends("layouts.app")
@section("content")
<section class="container dialog-content">
    <section class="modal-body d-flex">
        <section class="card ms-2 rellenar-espacio">
            <section class="pb-1">
                <section class="mt-4 mb-4 item-car">
                    @php
                        $items_carrito = session()->get('car');
                    @endphp
                    @if(empty($items_carrito))
                        <section class="mensaje-carrito-vacio">
                            <section>Carrito vacio</section>
                        </section>
                    @else
                        @foreach ($items_carrito as $item)
                            @php
                                $flag = false;
                                if(array_key_exists($item->id, session()->get('car'))) $flag = true
                            @endphp
                            <section class="d-flex info-tomo">
                                <section class="miniatura-tomo-carrito">
                                    <img src="{{$item->manga->url_portrait}}" alt="Portada_manga">
                                </section>
                                <section class="grey col-md-2 text-left">
                                    Capítulo: {{ $item->number_tome }}
                                </section>
                                <section class="grey col-md-2 text-left">
                                    <i class="fa-solid fa-dollar-sign"></i>
                                    Precio: {{ $item->price }}
                                </section>
                                {{-- <section class="grey col-md-2 text-left">
                                    <i class="fa-solid fa-list-ul"></i>
                                    Cantidad: {{ $item->cantidad }}
                                </section> --}}
                                <form class="grey col-md-4 text-right strong" method="POST"
                                    {{-- action="{{ route('edit_item', ['id' => $item->id]) }}"> --}}>
                                    @csrf
                                    <i class="fa-solid fa-list-ul"></i>
                                    Cantidad:
                                    <input class="input-cantidad" type="number" name="item_quantity"
                                        value= '{{ $item->cantidad }}' min="0" max="12">
                                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                                    <a class="boton-carrito boton-editar btn" href="{{ route('edit_item', ['id'=>$item->id]) }}">
                                        <i class="fa-solid fa-times"></i>
                                        Editar
                                    </a>
                                </form>
                                <section class="grey col-md-2 text-left">
                                    <a class="boton-carrito boton-eliminar btn" href="{{ route('remove_item', ['id'=>$item->id]) }}">
                                        <i class="fa-solid fa-times"></i>
                                        Eliminar
                                    </a>
                                </section>
                            </section>
                        @endforeach
                    @endif
                </section>
            </section>
        </section>
        <section>
            <section class="card info-carrito">
                Info carrito
            </section>
        </section>
    </section>
</section>
@endsection
