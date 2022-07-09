@extends("layouts.app")
@section("content")
<section class="container dialog-content">
    <section class="card">
        <section class="modal-header">
            <h4 class="modal-title">Gestionar tomos {{ $info_manga->name }}</h4>
        </section>
        <section class="modal-body">
            <form method="POST" action="{{route('add_tomo', ['id' => $info_manga->id])}}">
                @csrf
                <div class="form-floating mb-3">
                    <input type="number" name="number_tome" class="form-control" placeholder=".">
                    <label>Numero del tomo</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" name="number_pages" class="form-control" placeholder=".">
                    <label>Cantidad páginas</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="price" class="form-control" placeholder=".">
                    <label>Precio</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="published_at" class="form-control" placeholder=".">
                    <label>Fecha de publicacion</label>
                </div>
                <div class="input-group">
                    <input class="form-control" type="submit" value="Crear tomo">
                </div>
            </form>
        </section>
    </section>
</section>
@endsection
