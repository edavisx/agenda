<?php
namespace Formacom\controllers;
use Formacom\Core\Controller;
use Formacom\Models\Contactos;

class HomeController extends Controller{
    public function index(...$params){
        $contactos=Contactos::all();
        $data = [
            'mensaje' => 'Listado de Contactos en tu agenda',
            'contactos'=>$contactos
        ];

        $this->view('home', $data);
    }


    public function new(...$params){
        if(isset($_POST["nombreApellido"])){
            //var_dump($_POST);
            //exit();
            $datos = [
                'nombre' => $_POST['nombreApellido'] ?? null,
                'telefono' => $_POST['tlf'] ?? null,
                'email' => $_POST['correo'] ?? null,
                'direccion' => $_POST['direccion'] ?? null,
            ];
            //Contactos::create($datos);
            // Crear una nueva instancia del modelo y asignar valores
            
            $nuevoContacto = new Contactos();
            $nuevoContacto->nombre = $datos['nombre'];
            $nuevoContacto->telefono = $datos['telefono'];
            $nuevoContacto->telefono = $datos['email'];
            $nuevoContacto->telefono = $datos['direccion'];
            $nuevoContacto->save(); // Guardar el registro en la base de datos
            
        }
        $this->view("newContacto"); 
    }

    public function del($params){
        // Encontrar el registro por su ID
        $contacto = Contactos::find($params);
        // Borrar el registro
        $contacto->delete();

        $this->view('home', $data);
    }

    public function edit($params){
        // Encontrar el registro por su ID
        $contacto = Contactos::find($params);
        // Borrar el registro
     

        $this->view('home', $data);
    }



}
?>