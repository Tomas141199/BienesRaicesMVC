<main class="contenedor seccion">
    <h1>Contacto</h1>

    <?php if ($mensaje) { ?>
    <p class="alerta exito"><?php echo $mensaje ?></p>
    <?php } ?>

    <picture>
        <source srcset="build/img/destacada3.jpg" />
        <source srcset="build/img/destacada3.webp" />
        <img src="build/img/destacada3.jpg" alt="Casa en terraza" />
    </picture>

    <h2>Llena el formulario de contacto</h2>

    <form action="/contacto" method="POST" class="formulario">
        <fieldset>
            <legend>Informacion Personal</legend>

            <label for="contacto[nombre]">Nombre:</label>
            <input type="text" name="contacto[nombre]" id="nombre" placeholder="Tu Nombre" required />


            <label for="contacto[mensaje]">Mensaje:</label><textarea name="contacto[mensaje]" id="" cols="30" rows="10"
                required></textarea>
        </fieldset>

        <fieldset>
            <legend>Informacion sobre propiedad</legend>

            <label for="opciones">Vende o compra:</label>
            <select name="contacto[tipo]" id="opciones" required>
                <option value="" disabled selected>--Seleccione--</option>
                <option value="compra">Compra</option>
                <option value="vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o Presupuesto</label>
            <input type="number" name="contacto[precio]" id="presupuesto" placeholder="Tu precio o Presupuesto"
                required />
        </fieldset>

        <fieldset>
            <legend>Contacto</legend>
            <p>Como desea ser contactado:</p>

            <div class="forma-contacto">
                <label for="contactar-telefono">Telefono</label>
                <input type="radio" name="contacto[contacto]" id="contactar-telefono" value="telefono" />

                <label for="contactar-telefono">E-mail</label>
                <input type="radio" name="contacto[contacto]" id="contactar-telefono" value="email" />
            </div>

            <div id="contacto">

            </div>


        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde" />
    </form>
</main>