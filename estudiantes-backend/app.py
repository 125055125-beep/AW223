from flask  import Flask

app= Flask (__name__)

@app.route('/')
def inicio():
    return"Hello world Flask"

@app.route('/soy otra ruta', method=['POST'])
def otra():
    return"Esta es la direccion de otra ruta"

if __name__=='__main__' :
    app.run(debug=True)