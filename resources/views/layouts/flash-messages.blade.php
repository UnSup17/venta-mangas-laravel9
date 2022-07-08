@if (session('error'))
<div class="alert alert-danger alert-block m-0 position-fixed bottom-0" style="width: 100%; z-index: 1000">
    <button onclick="this.parentElement.style.display = 'none'" id="alert-btn" data-dismiss="alert" class="btn position-absolute top-50 translate-middle end-0"><i class="fa-solid fa-times"></i></button>
    <strong>{{ session('error') }}</strong>
</div>
    @php
        session()->forget('error');
    @endphp
@endif

@if (session('warning'))
<div class="alert alert-warning alert-block m-0 position-fixed bottom-0" style="width: 100%; z-index: 1000">
    <button onclick="this.parentElement.style.display = 'none'" id="alert-btn" data-dismiss="alert" class="btn position-absolute top-50 translate-middle end-0"><i class="fa-solid fa-times"></i></button>
    <strong>{{ session('warning') }}</strong>
</div>
    @php
        session()->forget('warning');
    @endphp
@endif

@if (session('success'))
<div class="alert alert-success alert-block m-0 position-fixed bottom-0" style="width: 100%; z-index: 1000">
    <button onclick="this.parentElement.style.display = 'none'" id="alert-btn" data-dismiss="alert" class="btn position-absolute top-50 translate-middle end-0"><i class="fa-solid fa-times"></i></button>
    <strong>{{ session('success') }}</strong>
</div>
    @php
        session()->forget('success');
    @endphp
@endif
