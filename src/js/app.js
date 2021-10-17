document.addEventListener("DOMContentLoaded", function () {
  eventListeners();
  darkMode();
});

function darkMode() {
  const prefiereDarkMode = window.matchMedia("(prefers-color-scheme: dark)");
  console.log(prefiereDarkMode.matches);
  // if (prefiereDarkMode.matches) {
  //   document.body.classList.add("dark-mode");
  // } else {
  //   document.body.classList.add("dark-mode");
  // }

  prefiereDarkMode.addEventListener("change", function () {
    if (prefiereDarkMode.matches) {
      document.body.classList.add("dark-mode");
    } else {
      document.body.classList.add("dark-mode");
    }
  });

  const botonDarkMode = document.querySelector(".dark-mode-boton");
  botonDarkMode.addEventListener("click", function () {
    document.body.classList.toggle("dark-mode");
  });
}

function eventListeners() {
  const mobileMenu = document.querySelector(".mobile-menu");
  mobileMenu.addEventListener("click", navegacionResponsive);

  //Muestra campos condicionales
  const metodoContacto = document.querySelectorAll(
    'input[name="contacto[contacto]"]'
  );

  metodoContacto.forEach((input) =>
    input.addEventListener("click", mostrarMetodosContacto)
  );
}

function navegacionResponsive() {
  const navegacion = document.querySelector(".navegacion");
  navegacion.classList.toggle("mostrar");
}

function mostrarMetodosContacto(e) {
  const contactoDiv = document.querySelector("#contacto");
  if (e.target.value === "telefono") {
    contactoDiv.innerHTML = `
            <label for="contacto[telefono]">Numero Telefono:</label>
            <input type="tel" name="contacto[telefono]" id="tel" placeholder="Tu Telefono" />

            <p>Eliga la fecha y la hora para la llamada:</p>

            <label for="fecha">Fecha</label>
            <input type="date" name="contacto[fecha]" id="fecha" />

            <label for="hora">Hora</label>
            <input type="time" name="contacto[hora]" id="hora" min="9:00" max="18:00" />
    `;
  } else {
    contactoDiv.innerHTML = `
         <label for="contacto[email]">E-mail:</label>
         <input type="email" name="contacto[email]" id="email" placeholder="Tu Email" required />
    `;
  }
}
