@extends("layouts.app")
@section("content")
<section class="container dialog-content">
    <section class="card">
        <section class="modal-header">
            <h5 class="modal-title"><b>Biblioteca</b></h5>
        </section>
        <section class="modal-body">
            <table class="tabla-info">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Foto</th>
                        <th>Sinopsis</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_mangas as $item)
                    <section>
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td><a class="miniatura"><img src="{{$item->url_portrait}}" alt="portada"></td>
                            <td>{{$item->synopsis}}</td>
                            <td>
                                <button><a href="{{ route('read_manga', ['manga' => $item->name, 'id' => $item->id])}}">Leer</a></button>
                                <button><a href="{{ route('form_update_manga', ['manga' => $item->name, 'id' => $item->id])}}">Actualizar</a></button>
                                <button><a class="delete" attr-url="{{ route('delete_manga', ['manga' => $item->name, 'id' => $item->id])}}">Eliminar</a></button>
                            </td>
                        </tr>
                    </section>
                    @endforeach
                </tbody>
            </table>
        </section>
        <button><a href="{{ route('form_create_manga') }}">Añadir manga</a></button>
    </section>
</section>
<script src="{{asset('js/delete.js')}}"></script>
@endsection
