<?php 
require 'vendor/autoload.php'; // Ruta al archivo autoload.php de Composer
use Dotenv\Dotenv;


// Importar y cargar las variables de entorno
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

require 'src/app.php';
