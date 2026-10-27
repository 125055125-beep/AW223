AlertInsert.js

const parametros = new URLSearchParams(window.location.search);
const estado = parametros.get("estadophp");

const mensajes = {
    // Usuarios y equipos
    usuario_guardado: "Éxito. El usuario fue registrado.",
    equipo_guardado:  "Éxito. El equipo fue registrado.",
    correo_duplicado: "Ese correo ya está registrado.",
    correo_invalido:  "El correo no tiene un formato válido.",
    rol_invalido:     "El rol seleccionado no existe.",

    // Solicitudes
    solicitud_guardada:   "Éxito. La solicitud fue registrada con estado Pendiente.",
    equipo_no_disponible: "Ese equipo no está disponible. Elige otro.",
    solicitante_invalido: "El solicitante seleccionado no existe.",

    // Generales
    campos_invalidos: "Revisa los datos. Todos los campos obligatorios deben llenarse.",
    error:            "Algo falló. Inténtalo nuevamente."
};

if (estado !== null && mensajes[estado]) {
    alert(mensajes[estado]);
}

// Limpia el parámetro de la URL para que el aviso no se repita al recargar
if (estado !== null) {
    window.history.replaceState({}, document.title, window.location.pathname);
}