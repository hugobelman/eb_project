<form action="{{url('/properties')}}" method="POST">
    @csrf
    <input style="display:none" type="text" name="source" value="Intern">
    <input style="display:none" type="text" name="property_id" value="{{$property['public_id']}}">

    <div class="row mb-3">
        <div class="col">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="col">
            <label for="phone" class="form-label">Telefono</label>
            <input type="text" class="form-control" id="phone" name="phone">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="email" class="form-label">Correo electronico</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="message" class="form-label">Mensaje</label>
            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
</form>