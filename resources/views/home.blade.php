@extends("layouts.app")
@section("content")
<section class="container dialog-content">
    <section class="modal-body">
        <div class="d-flex">
            <div class="card">
                <div>
                    Generos
                    <ul>
                        @foreach ($genders as $gender)
                            <li> <a href="{{route('home', ['gender' => $gender->enum_gender])}}">{{ ($gender->enum_gender) }}</a> </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="card ms-2">
                Catalogo mangas
                {{-- {{var_dump($catalogo)}} --}}
                @foreach ($catalogo as $item)
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
            </div>
        </div>
    </section>
</section>
@endsection
