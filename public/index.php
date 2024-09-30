<?php

use Stdev\Framework\Route\Router;

require '../vendor/autoload.php' ;


// $lines = file(dirname(__DIR__) . '/.env');
// foreach ($lines as $line) {
//     if (strpos(trim($line), '#') === 0) {
//         continue; // Ignorer les commentaires
//     }

//     if (!empty(trim($line))) {
//         list($key, $value) = explode('=', trim($line), 2);
//         $_ENV[$key] = $value;
//         putenv("$key=$value"); // Mettre dans les variables d'environnement
//     }
// }

// // Utilisation
// echo $_ENV['APP_NAME']; // Si .env contient une ligne comme APP_NAME=MonApplication


define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'ressources' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
// define('VIEWS',dirname(__DIR__).DIRECTORY_SEPARATOR.'ressources'.DIRECTORY_SEPARATOR.'views');

$router = new Router();


$router->get('/','App\Controllers\BlogController@index');
$router->get('/posts/:id','App\Controllers\BlogController@show');


$router->run($_GET['url']);