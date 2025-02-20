
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Nuevo Contacto</h3>
    <form action="http://127.0.0.1/agenda/home/new" method="post">
        <input type="text" name="nombreApellido" id="" placeholder="Nombres y Apellidos" required>
        <br>
        <input type="text" name="tlf" id="" placeholder="Tlf" required>
        <br>
        <input type="email" name="correo" id="" placeholder="correo electrónico" required>
        <br>
        <input type="text" id="" name="direccion" placeholder="dirección (no obligatoria)"><br>
        <br>
        <input type="submit" value="AGREGAR"><br>
    </form>
    <br>
    <form action="http://127.0.0.1/agenda/" method="post">
        <input type="text" name="cancelar" style="display: none">
        <input type="submit" value="CANCELAR"><br>
    </form>

</body>
</html>