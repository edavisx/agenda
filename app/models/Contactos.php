<?php

namespace Formacom\Models;
use Illuminate\Database\Eloquent\Model;

// esta clase es un modelo de la tabla "contactos"
// que usa el ORM Eloquent
// lo que requiere previamente es la conexión a la BBDD
// lo que se hizo en el fichero database.php
class Contactos extends Model
{
    protected $table="contactos";
    protected $primaryKey = 'id';
    public $timestamps = false;






}