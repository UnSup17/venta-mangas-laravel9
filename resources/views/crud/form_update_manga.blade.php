@extends("layouts.app")
@section("content")
<section class="container dialog-content">
    <section class="card">
        <section class="modal-header">
            <h5 class="modal-title">Agregar manga</h5>
        </section>
        <section class="modal-body">
            <form method="POST" action="{{route('update_manga')}}">
                <input type="hidden" name="id" value="{{$info_manga->id}}">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control" placeholder="." value="{{$info_manga->name}}">
                    <label>Nombre</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="url" name="url_portrait" class="form-control" placeholder="." value="{{$info_manga->url_portrait}}">
                    <label>url_imagen</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="state" value="{{$info_manga->state}}">
                      <option value="Emision">En emision</option>
                      <option value="Finalizado">Finalizado</option>
                    </select>
                    <label>Estado de publicación</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="published_at" class="form-control" placeholder="." value="{{$info_manga->published_at}}">
                    <label>Fecha de publicacion</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="periodicity">
                        <option value="Diaria" <?php if ($info_manga->periodicity == "Diario") echo("selected")?>>Diario</option>
                        <option value="Semanal" <?php if ($info_manga->periodicity == "Semanal") echo("selected")?>>Semanal</option>
                        <option value="Mensual" <?php if ($info_manga->periodicity == "Mensual") echo("selected")?>>Mensual</option>
                        <option value="Trimestral" <?php if ($info_manga->periodicity == "Trimestral") echo("selected")?>>Trimestral</option>
                    </select>
                    <label>Estado de publicación</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea style="height: 300px" name="synopsis" class="form-control" placeholder=".">{{$info_manga->synopsis}}</textarea>
                    <label>Sinopsis</label>
                </div>
                <div class="input-group">
                    <input class="form-control" type="submit" value="Actualizar manga">
                </div>
            </form>
        </section>
    </section>
</section>
@endsection
