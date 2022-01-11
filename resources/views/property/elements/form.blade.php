<form action="{{url('/properties')}}" method="POST">
    @csrf
    <input style="display:none" type="text" name="source" value="Intern">
    <input style="display:none" type="text" name="property_id" value="{{$property['public_id']}}">

    <div class="row mb-3">
        <div class="col">
            <label for="name" class="form-label">Nombre completo</label>
            <input type="text" class="form-control" id="name" name="name" required>
            <div id="phone" class="form-text">Usaremos este nombre para contactarte</div>
        </div>
        <div class="col">
            <label for="phone" class="form-label">Telefono</label>
            <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{2}[0-9]{2}" required>
            <div id="phone" class="form-text">Ejemplo: 462-264-4530</div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="message" class="form-label">Mensaje</label>
            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
</form>