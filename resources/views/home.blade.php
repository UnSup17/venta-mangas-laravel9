@extends("layouts.app")
@section("content")
<section class="container dialog-content">
    <section class="modal-body">
        <div class="d-flex">
            <div class="card p-2 tabla-generos">
                <div>
                    <h5 class="pt-2">Filtro</h5>
                    <hr>
                    <form action="{{route('home')}}">
                        @foreach ($genders as $gender)
                            <div>
                                <input value="{{$gender->id}}" type="radio" name="selected_id" id="gender-{{$gender->id}}" @php
                                    if (isset($filtrado) && $gender->id == $filtrado) echo 'checked'
                                @endphp>
                                    <label for="gender-{{$gender->id}}">{{$gender->enum_gender}}</label>
                            </div>
                        @endforeach
                        <hr>
                        <div>
                            <input value="limpiar" type="radio" name="selected_id" id="limpiar">
                                <label for="limpiar">Limpiar</label>
                        </div>
                        <hr>
                        <button>Filtrar</button>
                    </form>
                </div>
            </div>
            <div class="card ms-2 rellenar-espacio">
                <div class="container pb-4">
                    <section class="section">
                        <div class="section_content">
                            @if($catalogo->isEmpty())
                                <div class="no-catalogo">
                                    No se encontraron resultados para este nombre de manga
                                </div>
                            @endif
                            @foreach ($catalogo as $item)
                            <div class="section_item window window-default">
                                <a href="{{ route('read_manga', ['manga' => $item->name, 'id' => $item->id])}}">
                                    <div class="window_content">
                                        <img class="portada_manga" src="{{$item->url_portrait}}" alt="portada">
                                        <div class="manga_name">
                                            <button>{{$item->name}}</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
