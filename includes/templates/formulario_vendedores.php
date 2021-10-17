<fieldset>
    <legend>Informacion General</legend>
    <label for="nombre">Nombre:</label>
    <input type="text" name="vendedor[nombre]" placeholder="Nombre del vendedor"
        value="<?php echo s($vendedor->nombre) ?>">

    <label for="apellido">Apellido:</label>
    <input type="text" name="vendedor[apellido]" placeholder="Apellido del vendedor"
        value="<?php echo s($vendedor->apellido) ?>">

</fieldset>

<fieldset>
    <legend>Informacion Extra</legend>
    <label for="nombre">Telefono:</label>
    <input type="text" name="vendedor[telefono]" placeholder="Telefono del vendedor"
        value="<?php echo s($vendedor->telefono) ?>">
</fieldset>