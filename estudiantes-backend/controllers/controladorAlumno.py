from flask import Blueprint  

controladorAlumnoBP= Blueprint('controladorAlumno ', __name__)

@controladorAlumnoBP.route('/')
def inicio():
    return"Hola soy el backend de alumno"

""" ruta para insert """
@controladorAlumnoBP.route('/guardarAlumno', methods=['POST'])
def guardar():
    return'Se guardo el alumno'


""" ruta para consulta todo esta tiene que ser get """
@controladorAlumnoBP.route('/consultaTodo')
def consultatodo():
    return'Se consulto todo'


""" ruta para actualizar """
@controladorAlumnoBP.route('/actualizarAlumno', methods=['PUT'])
def actualizar():
    return'Se actualizo el alumno'


""" ruta para eliminar"""
@controladorAlumnoBP.route('/eliminarAlumno', methods=['DELETE'])
def eliminar():
    return'Se borro el alumno'


