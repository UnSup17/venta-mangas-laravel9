@extends("layouts.app")
@section("content")
<section class="container dialog-content">
    <section class="modal-body">
        <div class="d-flex">
            <div class="card">
                <div>
                    <h5>Filtro por género</h5>
                    <form action="{{route('home')}}">
                        @foreach ($genders as $gender)
                            <div><input value="{{$gender->enum_gender}}" type="checkbox" name="{{'gender'.$gender->id}}" id="{{'gender-'.$gender->enum_gender}}"><label for="{{'gender-'.$gender->enum_gender}}">{{$gender->enum_gender}}</label></div>
                        @endforeach
                        <button>Filtrar</button>
                    </form>
                </div>
            </div>
            <div class="card ms-2">
                <div class="container">
                    <section class="section">
                        <div class="section_content">
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
