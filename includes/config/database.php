<?php

function conectarDB()
{
    $db = new mysqli('localhost', 'root', '', 'bienes_raices');
    if (!$db) {
        echo "Error no se pudo conecetar";
        exit;
    }

    return $db;
}