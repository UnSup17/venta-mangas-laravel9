@if ($message = Session::get('success'))
<div class="alert alert-success alert-block m-0 position-fixed bottom-0" style="width: 100%; z-index: 1000">
    <button onclick="this.parentElement.style.display = 'none'" id="alert-btn" data-dismiss="alert" class="btn position-absolute top-50 translate-middle end-0"><i class="fa-solid fa-times"></i></button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block m-0 position-fixed bottom-0" style="width: 100%; z-index: 1000">
    <button onclick="this.parentElement.style.display = 'none'" id="alert-btn" data-dismiss="alert" class="btn position-absolute top-50 translate-middle end-0"><i class="fa-solid fa-times"></i></button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block m-0 position-fixed bottom-0" style="width: 100%; z-index: 1000">
    <button onclick="this.parentElement.style.display = 'none'" id="alert-btn" data-dismiss="alert" class="btn position-absolute top-50 translate-middle end-0"><i class="fa-solid fa-times"></i></button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger alert-block m-0 position-fixed bottom-0" style="width: 100%; z-index: 1000">
	<button onclick="this.parentElement.style.display = 'none'" id="alert-btn" data-dismiss="alert" class="btn position-absolute top-50 translate-middle end-0"><i class="fa-solid fa-times"></i></button>

    {{ implode('', $errors->all('<div>:message</div>')) }}
</div>
@endif
