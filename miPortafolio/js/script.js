/* Cambiar el HTML desde JS */
const textoBienvenida = document.getElementById("mensaje-bienvenida");
const btnMensaje = document.getElementById("btn-mensaje");

const frases = [
    "¡Hola! Bienvenido a mi Portafolio, ahora con JavaScript",
    "Aquí comparto lo que estoy aprendiendo",
    "Gracias por visitar mi sitio",
    "Bienvenido a mi sitio web personal"
];
let posFrase = -1;

btnMensaje.addEventListener("click", () => {
    posFrase = (posFrase + 1) % frases.length;
    textoBienvenida.textContent = frases[posFrase];
});

/* Cambiar el CSS desde JS */
const cajas = document.querySelectorAll(".lista-habilidades li");
const btnColor = document.getElementById("btn-color");
const btnFuente = document.getElementById("btn-fuente");

const paletas = ["#5f134f", "#1f4e79", "#2e6b3a", "#8a4b08", "#4a1f7a"];
const tipografias = [
    "Verdana, sans-serif",
    "'Times New Roman', serif",
    "Tahoma, sans-serif",
    "'Lucida Console', monospace",
    "'Palatino Linotype', serif"
];
let posColor = 0;
let posFuente = -1;

btnColor.addEventListener("click", () => {
    posColor = (posColor + 1) % paletas.length;
    cajas.forEach((caja) => {
        caja.style.backgroundColor = paletas[posColor];
    });
});

btnFuente.addEventListener("click", () => {
    posFuente = (posFuente + 1) % tipografias.length;
    cajas.forEach((caja) => {
        caja.style.fontFamily = tipografias[posFuente];
    });
});

/* formulario*/
const formulario = document.getElementById("formulario");
const inputNombre = document.getElementById("nombre");
const inputCorreo = document.getElementById("email");

formulario.addEventListener("submit", (e) => {
    e.preventDefault();

    const nombre = inputNombre.value.trim();
    const correo = inputCorreo.value.trim();

    if (nombre === "") {
        alert("Por favor, escribe tu nombre");
        inputNombre.focus();
        return;
    }

    if (correo === "") {
        alert("El correo es obligatorio");
        inputCorreo.focus();
        return;
    }

    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(correo)) {
        alert("Escribe un correo válido, por ejemplo: ejemplo@correo.com");
        inputCorreo.focus();
        return;
    }

    alert("Formulario enviado correctamente");
    formulario.reset();
});