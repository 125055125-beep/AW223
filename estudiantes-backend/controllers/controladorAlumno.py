from flask import Blueprint, request, jsonify
from Models.modelEstudiante import *


controladorAlumnoBP= Blueprint('controladorAlumno ', __name__)

@controladorAlumnoBP.route('/')
def inicio():
    return"Hola soy el backend de alumno"

""" ruta para insert """
@controladorAlumnoBP.route('/guardarAlumno', methods=['POST'])
def guardar():
    nombreReq= request.form.get('txtNombre', '').strip()
    carreraReq= request.form.get('txtCarrera', '').strip()

    try:
        insertEstudiante(nombreReq,carreraReq)
        return jsonify({"Completado":"Alumno Guardado"}),200
    except Exception as e:
        return jsonify({"Error": str(e)}),500


""" ruta para consulta todo esta tiene que ser get """
@controladorAlumnoBP.route('/consultarAlumno', methods=['GET'])
def consultaAll():
    try:
        alumnos = selectAll()
        return jsonify(alumnos), 200;
    except Exception as e:
        print(f"Error: {e}")
        return jsonify({"Error": str(e)}),500

""" ruta para actualizar """
@controladorAlumnoBP.route('/actualizarAlumno/<int:id>', methods=['PUT'])
def actualizarAlumno(id):
    try:
        nombre = request.form.get('txtNombre')
        carrera = request.form.get('txtCarrera')

        updateEstudiante(id, nombre, carrera)
        return jsonify({"Completado": "Alumno actualizado"}), 200

    except Exception as e:
        return jsonify({"Error": str(e)}),500
    
    


""" ruta para eliminar"""
@controladorAlumnoBP.route('/eliminarAlumno', methods=['PUT'])
def borrar():
    id = request.form.get('id', '').strip()

    try:
        softDeleteEstudiante(id)
        return jsonify({"Completado":"Alumno Borrado"}),200

    except Exception as e:
        return jsonify({"Error": str(e)}),500


""" ruta para consulta por id """
@controladorAlumnoBP.route('/consultarAlumno/<int:id>', methods=['GET'])
def consultarAlumno(id):
    try:
        alumno = getEstudiantesById(id)
        if alumno is None:
           return jsonify({"Error": "Alumno no encontrado"}),404

        return jsonify({"id": alumno[0], "nombre": alumno[1], "carrera": alumno[2], "state": alumno[3]}),200

    except Exception as e:
        return jsonify({"Error": str(e)}),500



