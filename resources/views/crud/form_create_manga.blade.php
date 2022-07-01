@extends("layouts.app")
@section("content")
<section class="container dialog-content">
    <section class="card">
        <section class="modal-header">
            <h5 class="modal-title">Agregar manga</h5>
        </section>
        <section class="modal-body">
            <form method="POST" action="{{route('create_manga')}}">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control" placeholder=".">
                    <label>Nombre</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="url" name="url_portrait" class="form-control" placeholder=".">
                    <label>url_imagen</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="state">
                      <option value="broadcast">En emision</option>
                      <option value="finished">Finalizado</option>
                    </select>
                    <label>Estado de publicación</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="published_at" class="form-control" placeholder=".">
                    <label>Fecha de publicacion</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="periodicity">
                        <option value="diaria">Diario</option>
                        <option value="semanal">Semanal</option>
                        <option value="mensual">Mensual</option>
                        <option value="trimestral">Trimestral</option>
                    </select>
                    <label>Estado de publicación</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea style="height: 300px" name="synopsis" class="form-control" placeholder="."></textarea>
                    <label>Sinopsis</label>
                </div>
                <div class="input-group">
                    <input class="form-control" type="submit" value="Agregar manga">
                </div>
            </form>
        </section>
    </section>
</section>
@endsection
