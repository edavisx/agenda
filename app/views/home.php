<?php 
//session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>web de TAREAS</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    
    <h1><?php echo $data["mensaje"]; /*var_dump($data);*/ ?></h1>
    
    <?php
        /*
        foreach ($data["contactos"] as $key => $contactos) {
          echo $contactos->nombre."<br>";
          echo $contactos->id."<br>";
          echo $contactos->telefono."<br>";
          echo $contactos->email."<br>";
          echo $contactos->direccion."<br>";
          echo $contactos->fecha_creacion."<br>";
        }
        */
    ?>
 
    <p>
    
    <form action="http://127.0.0.1/agenda/home/new" method="POST">
        <button type="submit">agregar Contacto</button>
    </form>
    </p>
    
    
    <section class="contenedorPrincipal">

    
            <div class="lista">
                <table id="tablaIncidencias">
                    <thead>
                        <th>fecha de creación (hora servidor)</th>
                        <th>Nombre</th>
                        <th>Tlf</th>
                        <th>Email</th>
                        <th>Dirección</th>
                        <th>Operaciones</th>
                    </thead>
                    <tbody id="tbodyTareas">
                        <?php
                            if (isset($data)) {
                            foreach ($data["contactos"] as $key => $contactos) {
                            
                            echo "<tr>                            
                            <td>" . 
                                $contactos->fecha_creacion .
                            "</td>
                            <td>" . 
                                $contactos->nombre .
                            "</td>
                            <td>" . 
                                $contactos->telefono .
                            "</td>
                            <td>".
                                $contactos->email .
                            "</td>
                            <td>". 
                                $contactos->direccion .
                            "</td>" .

                            "<td> 
                                <a href='http://127.0.0.1/agenda/home/edit/"
                                    . $contactos->id . "'>editar</a>
                                | 
                                <a href='http://127.0.0.1/agenda/home/del/"
                                    . $contactos->id . "'>eliminar</a>
                            </td>
                            </tr>";

                        }
                        }
                        ?>
                        
                    </tbody>

                </table>
            </div>
        </section>

    <?php if (isset($error)) {
        echo "<h2 style='background-color:red'>" . $error . "</h2>";
    }
    ?>
    
</body>



</html>