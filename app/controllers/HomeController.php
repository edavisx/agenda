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

            // Daba un error que se solucionó colocando 
            //  "public $timestamps = false;"
            // en el modelo Contactos

            $nuevoContacto = new Contactos();
            
            $nuevoContacto->nombre = $datos['nombre'];
            $nuevoContacto->telefono = $datos['telefono'];
            $nuevoContacto->email = $datos['email'];
            $nuevoContacto->direccion = $datos['direccion'];
            
            $nuevoContacto->save(); // Guardar el registro en la base de datos
            
            $this->index(); 
            //OJO se ejecuta index de HomeController y 
            // una vez hecho entonces vuelve a este punto.
            // Por ello, si no se coloca el else se ejecutaría
            // el view('newContacto'), lo que hace que se 
            // muestre la vista de newContacto debajo de la 
            // vista de home...
            // Otra forma era usar return $this->index();
        }
        else{
            $this->view('newContacto');
        }
    }

    public function del($params){
        // Encontrar el registro por su ID
        $contacto = Contactos::find($params);
        // Borrar el registro
        $contacto->delete();

        $this->index();   
    }

    public function edit($params){
        
        $contacto = Contactos::find($params);
        $datos = [
            'mensaje' => 'Datos del constacto a editar',
            'contacto'=>$contacto
        ];
        
        //if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['nombreApellido'])) {
            $this->update($params);
        }
    
        $this->view('editarContacto', $datos);
    }

    public function update($params){
           
        $contacto = Contactos::find($params);
    
        $contacto->nombre = $_POST['nombreApellido'];
        $contacto->telefono = $_POST['tlf'];
        $contacto->email = $_POST['email'];
        $contacto->direccion = $_POST['direccion'];
        $contacto->save();
        
        /*
        $contacto = Contactos::find($params);
    
        $datos = [
            'mensaje' => 'Editado',
            'contacto'=>$contacto
        ];
      
        $this->view('home', $datos);
        */
        // dado que se requiere volver a index, 
        // lo anterior se puede sustituir por
        $this->index();
    }

}
?>
