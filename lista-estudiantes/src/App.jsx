import Estudiante from "./components/Estudiante";
import "./App.css";

 

export default function App(){

  const estudiantes =[
    {id:1,nombre:"Schoesntatt Rangel", carrera:"Sistemas"},
    {id:2,nombre:"Jorge Hidalgo", carrera:"Comercio"},
    {id:3,nombre:"Andrea Galvan", carrera:"Psicologia"}

  ];
  return(
    <main className="contenedor">
      <h1>Listado de estudiantes</h1>
      
      <form>
        <input type="text" placeholder="Escribe nombre"/>
        <input type="text" placeholder="Escribe carrera"/>
        <button type="button">Agregar</button>
      </form>

      <h2>Estudiantes Registrados</h2>
      <ul>
        {estudiantes.map((estudiante) =>(
        <Estudiante
          key={estudiante.id}
          estudiante={estudiante}
        />
        
        ))
        }

      </ul>

      <p>Total de estudiantes: {estudiantes.length}</p>
    </main>
  );
}
