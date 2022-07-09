@extends("layouts.app")
@section("content")
<section class="container dialog-content">
    <section class="card">
        <section class="modal-header">
            <h5 class="modal-title"><b>Tomos de {{ $info_tomos->name }}</b></h5>
        </section>
        <section class="modal-body">
            @if($info_tomos->tomes == null)
                <section>No hay registros</section>
            @else
            <table class="tabla-info rellenar-espacio">
                <thead>
                    <tr>
                        <th>Capitulo</th>
                        <th>Páginas</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($info_tomos->tomes as $item)
                    <section>
                        <tr style="text-align: center">
                            <td>{{ $item->number_tome }}</td>
                            <td>{{ $item->number_pages }}</td>
                            <td>{{ $item->price }}</td>
                            <td>
                                <button><a href="{{ route('form_update_tomo', ['id' => $item->id])}}">Actualizar</a></button>
                                <button><a class="delete" attr-url="{{ route('delete_tomo', ['id' => $item->id])}}">Eliminar</a></button>
                            </td>
                        </tr>
                    </section>
                    @endforeach
                </tbody>
            </table>
            @endif
        </section>
        <button><a href="{{ route('form_add_tomo', ['id' => $info_tomos->id]) }}">Añadir tomo</a></button>
    </section>
</section>
<script src="{{asset('js/delete.js')}}"></script>
@endsection
