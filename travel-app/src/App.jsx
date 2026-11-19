import { useState } from "react";
import Viaje from "./components/Viaje";
import Favoritos from "./components/Favoritos";
import "./App.css";

const viajes = [
  {
    id: 1,
    nombre: "Ciudad de México",
    ubicacion: "México",
    precio: "$5,500 MXN",
    imagen: "https://picsum.photos/seed/mexico/400/250",
    descripcion: "Capital llena de historia, museos, gastronomía y cultura.",
    detalles: "Incluye 3 noches de hotel, tour por el Centro Histórico y Teotihuacán.",
  },
  {
    id: 2,
    nombre: "París",
    ubicacion: "Francia",
    precio: "$18,000 MXN",
    imagen: "https://picsum.photos/seed/paris/400/250",
    descripcion: "La ciudad del amor, famosa por la Torre Eiffel y el Louvre.",
    detalles: "Incluye 5 noches, visita al Louvre y crucero por el Sena.",
  },
  {
    id: 3,
    nombre: "Cancún",
    ubicacion: "México",
    precio: "$9,800 MXN",
    imagen: "https://picsum.photos/seed/cancun/400/250",
    descripcion: "Playas de arena blanca y mar turquesa en el Caribe.",
    detalles: "Todo incluido por 4 noches, snorkel y visita a Chichén Itzá.",
  },
  {
    id: 4,
    nombre: "Tokio",
    ubicacion: "Japón",
    precio: "$32,000 MXN",
    imagen: "https://picsum.photos/seed/tokio/400/250",
    descripcion: "Mezcla de tecnología, tradición y comida increíble.",
    detalles: "Incluye 7 noches, pase de metro y visita a templos y Akihabara.",
  },
];

export default function App() {
  const [busqueda, setBusqueda] = useState("");
  const [favoritos, setFavoritos] = useState([]); // ids de favoritos
  const [soloFavoritos, setSoloFavoritos] = useState(false);

  const toggleFavorito = (id) => {
    setFavoritos((prev) =>
      prev.includes(id) ? prev.filter((f) => f !== id) : [...prev, id]
    );
  };

  const viajesFiltrados = viajes.filter((v) => {
    const texto = `${v.nombre} ${v.ubicacion}`.toLowerCase();
    const coincide = texto.includes(busqueda.toLowerCase());
    return coincide && (!soloFavoritos || favoritos.includes(v.id));
  });

  const viajesFavoritos = viajes.filter((v) => favoritos.includes(v.id));

  return (
    <main className="contenedor">
      <h1>Descubre tu próximo destino</h1>
      <p>Explora lugares increíbles y planea tus próximas vacaciones</p>

      <form onSubmit={(e) => e.preventDefault()}>
        <input
          type="text"
          placeholder="Buscar destino turístico"
          value={busqueda}
          onChange={(e) => setBusqueda(e.target.value)}
        />
        <button type="button" onClick={() => setSoloFavoritos(!soloFavoritos)}>
          {soloFavoritos ? "Mostrar todos" : "Mostrar favoritos"}
        </button>
      </form>

      <h2>Favoritos: {favoritos.length}</h2>

      <h2>Viajes Disponibles</h2>
      {viajesFiltrados.length === 0 && <p>No se encontraron destinos.</p>}
      <ul>
        {viajesFiltrados.map((viaje) => (
          <Viaje
            key={viaje.id}
            viaje={viaje}
            esFavorito={favoritos.includes(viaje.id)}
            onToggleFavorito={() => toggleFavorito(viaje.id)}
          />
        ))}
      </ul>

      <h2>Destinos Favoritos ({favoritos.length})</h2>
      {viajesFavoritos.length === 0 ? (
        <p>Tu próxima aventura comienza aquí. Marca un destino con ♡</p>
      ) : (
        <ul>
          {viajesFavoritos.map((fav) => (
            <Favoritos
              key={fav.id}
              favorito={fav}
              onQuitar={() => toggleFavorito(fav.id)}
            />
          ))}
        </ul>
      )}
    </main>
  );
}