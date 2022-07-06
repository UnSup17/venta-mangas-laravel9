@extends("layouts.app")
@section("content")
<section class="container dialog-content">
    <section class="modal-body d-flex">
            <div class="card ms-2 rellenar-espacio">
                <div class="container pb-4">
                    <section class="section section_content">
                        <section class="lista-overflow">
                            @foreach ($carrito as $item)
                                @php
                                    $flag = false;
                                    if(array_key_exists($item->id, session()->get('car'))) $flag = true
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
                                        action="{{ route('add_item', ['manga' => $info_manga->name, 'id' => $info_manga->id]) }}">
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
                                                value= '{{ session()->get('car')[$item->id] }}' disabled
                                            @else
                                                value= '1'
                                            @endif
                                            min="1" max="12">
                                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                                    </form>
                                </div>
                            @endforeach
                    </section>
                </div>
            </div>
    </section>
</section>
@endsection
