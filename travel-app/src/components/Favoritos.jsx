
export default function Favoritos({ favorito, onQuitar }) {
  return (
    <li className="fav-item">
      <strong>{favorito.nombre}</strong> — {favorito.ubicacion} — {favorito.precio}
      <button type="button" onClick={onQuitar}>Quitar</button>
    </li>
  );
}

