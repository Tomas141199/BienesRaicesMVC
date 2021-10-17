<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController
{
    public static function index(Router $router)
    {
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();

        //Contiene mensaje condicional 
        $resultado  = $_GET['resultado'] ?? null;
        $router->render(
            'propiedades/admin',
            [
                'propiedades' => $propiedades,
                'vendedores' => $vendedores,
                'resultado' => $resultado
            ]
        );
    }

    public static function crear(Router $router)
    {
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();
        //Arreglo con mensajes de errores 
        $errores = Propiedad::getErrores();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            //Crea una nueva instancia
            $propiedad = new Propiedad($_POST['propiedad']);


            //Subida de archivos
            //Generar un nombre unico 
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            //Realiza un resize a la imagen 
            // open file a image resource
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $img = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImagen($nombreImagen);
            }

            //Asignar files hacia una variable
            $imagen = $_FILES['propiedad']['tmp_name']['imagen'];

            //Validar
            $errores = $propiedad->validar();

            if (empty($errores)) {
                //Creacion de la carpeta para subir imagenes
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
                //Guarda la imagen en el servidor
                $img->save(CARPETA_IMAGENES . $nombreImagen);
                //Guardaa en la base de datos
                $propiedad->guardar();
            }
        }
        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router)
    {
        $id = validarORedireccionar('/admin');
        $propiedad = Propiedad::find($id);
        $vendedores = Vendedor::all();
        //Arreglo con mensajes de errores 
        $errores = Propiedad::getErrores();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            //Asignar los atributos 
            $args = $_POST['propiedad'];
            $propiedad->sincronizar($args);

            $errores = $propiedad->validar();

            //Generar un nombre unico 
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            // open file a image resource
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $img = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImagen($nombreImagen);
            }

            //Subida de archivos

            if (empty($errores)) {
                //Almacena la imagen
                if ($_FILES['propiedad']['tmp_name']['imagen']) {
                    $img->save(CARPETA_IMAGENES . $nombreImagen);
                }

                $resultado = $propiedad->guardar();
            }
        }


        $router->render('/propiedades/actualizar', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {

                $tipo = $_POST['tipo'];

                if (validarTipoContenido($tipo)) {
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
            }
        }
    }
}