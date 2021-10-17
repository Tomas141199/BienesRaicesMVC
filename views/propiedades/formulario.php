<fieldset>
    <legend>Informacion General</legend>
    <label for="titulo">Titulo:</label>
    <input type="text" name="propiedad[titulo]" placeholder="Titulo Propiedad"
        value="<?php echo s($propiedad->titulo) ?>">

    <label for="precio">Precio:</label>
    <input type="number" name="propiedad[precio]" placeholder="Precio Propiedad"
        value="<?php echo s($propiedad->precio) ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" name="propiedad[imagen]" id="imagen" placeholder="Titulo Propiedad"
        accept="image/jpeg, image/png">

    <?php if ($propiedad->imagen) : ?>
    <img src="/imagenes/<?php echo $propiedad->imagen ?>" alt="imagen propiedad" class="imagen-small">
    <?php endif; ?>

    <label for="descripcion">Descripcion:</label>
    <textarea name="propiedad[descripcion]" id="descripcion" cols="30"
        rows="10"> <?php echo s($propiedad->descripcion) ?></textarea>

</fieldset>

<fieldset>
    <legend>Informacion Propiedad</legend>

    <label for="habitaciones">Habitacionees:</label>
    <input type="number" name="propiedad[habitaciones]" placeholder="Ej. 3" min="1" max="10"
        value="<?php echo s($propiedad->habitaciones) ?>">


    <label for="wc">Baños:</label>
    <input type="number" name="propiedad[wc]" placeholder="Ej. 2" value="<?php echo s($propiedad->wc) ?>">


    <label for="estacionamiento">Estacionamiento:</label>
    <input type="number" name="propiedad[estacionamiento]" placeholder="Ej. 2"
        value="<?php echo s($propiedad->estacionamiento) ?>">

</fieldset>

<fieldset>
    <legend>Vendedor</legend>
    <select name="propiedad[id_vendedor]" id="vendedor">
        <option value="" selected disabled>--Selecciona--</option>
        <?php foreach ($vendedores as $vendedor) : ?>
        <option <?php echo $propiedad->id_vendedor === $vendedor->id ? 'selected' : '' ?>
            value="<?php echo s($vendedor->id) ?>">
            <?php echo $vendedor->nombre . " " . $vendedor->apellido . " " ?>
        </option>
        <?php endforeach; ?>
    </select>


</fieldset>