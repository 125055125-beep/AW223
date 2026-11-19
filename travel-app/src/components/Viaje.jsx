import { useState } from "react";

export default function Viaje({ viaje, esFavorito, onToggleFavorito }) {
  const [mostrarDetalles, setMostrarDetalles] = useState(false);

  return (
    <li className="tarjeta">
      <img src={viaje.imagen} alt={viaje.nombre} />
      <div className="info">
        <h3>{viaje.nombre}</h3>
        <p className="ubicacion">📍 {viaje.ubicacion}</p>
        <p><strong>{viaje.precio}</strong> (aprox.)</p>
        <p>{viaje.descripcion}</p>

        {mostrarDetalles && <p className="detalles">{viaje.detalles}</p>}

        <div className="botones">
          <button type="button" onClick={() => setMostrarDetalles(!mostrarDetalles)}>
            {mostrarDetalles ? "Ocultar detalles" : "Ver detalles"}
          </button>
          <button type="button" onClick={onToggleFavorito}>
            {esFavorito ? "♥ Quitar favorito" : "♡ Agregar favorito"}
          </button>
        </div>
      </div>
    </li>
  );
}