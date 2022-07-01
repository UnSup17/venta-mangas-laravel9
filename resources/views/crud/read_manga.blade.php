@extends("layouts.app")
@section("content")
<section class="container dialog-content">
    <section class="card">
        <section class="modal-header">
            <h5 class ="modal-title"><b>{{$info_manga->name}}</b></h5>
        </section>
        <section class="modal-body">
            <section class="d-flex">
                <section>
                    <section class="portada_manga">
                        <img src="{{$info_manga->url_portrait}}" alt="caratula_manga">
                    </section>
                    <section><b>Estado: </b>{{$info_manga->state}}</section>
                    <section><b>Fecha: </b>{{$info_manga->published_at}}</section>
                    <section><b>Periodicidad: </b>{{$info_manga->periodicity}}</section>
                </section>
                <section class="px-3">
                    <section>
                        <b>Sinopsis:</b><br>{{$info_manga->synopsis}}<br><br>
                    </section>
                    <section>
                        Lista de mangas (en progreso)
                    </section>
                </section>
            </section>
        </section>
    </section>
</section>
@endsection
