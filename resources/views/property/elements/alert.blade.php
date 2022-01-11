<div class="row">
    <div class="col">
        <div class="alert alert-{{Session::get('status')}}" role="alert">
            {{ Session::get('status') == 'success' ? '¡Pronto te contactaremos!' : 'Error'}}
        </div>
    </div>
</div>