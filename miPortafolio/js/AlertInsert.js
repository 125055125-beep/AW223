
const parametros= new URLSearchParams(window.location.search);
const estado = parametros.get("estadophp")

if(estado=== "exito"){
    alert("Exito, Tu mensaje fue guardado");

}else if(estado=== "error"){
    alert("Algo fallo, intentalo nuevamente");

}

if(estado != null){
    window.history.replaceState({}, document.title, window.location.pathname);  /* no vuelve a desplegar el mensaje
 */
}