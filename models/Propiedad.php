<?php

namespace Model;

class Propiedad extends ActiveRecord
{
    protected static $tabla = 'propiedades';
    protected static $columnasDB = [
        'id', 'titulo', 'precio', 'imagen',
        'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'id_vendedor'
    ];


    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $id_vendedor;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->id_vendedor = $args['id_vendedor'] ?? '';
    }

    public function validar()
    {
        if (!$this->titulo) {
            self::$errores[] = "El titulo es Obligatorio";
        }

        if (!$this->precio) {
            self::$errores[] = "El precio es Obligatorio";
        }

        if (strlen($this->descripcion) < 50) {
            self::$errores[] = "La descripcion es obligatoria o debe tener almenos 50 caracteres";
        }

        if (!$this->habitaciones) {
            self::$errores[] = "El numero de habitaciones es Obligatorio";
        }

        if (!$this->wc) {
            self::$errores[] = "El numero de wc es Obligatorio";
        }

        if (!$this->estacionamiento) {
            self::$errores[] = "El numero de estacionamientos es Obligatorio";
        }

        if (!$this->id_vendedor) {
            self::$errores[] = "El vendedor es Obligatorio";
        }

        if (!$this->imagen) {
            self::$errores[] = "La Imagen es Obligatoria";
        }

        return self::$errores;
    }
}