<?php
namespace Stdev\Framework\Route ;


class Router
{
    public $routes = [] ;
   

    /**
     * enregister une route dans GET
     */
    public function get($url,$action) {
        $this->routes['GET'][] = new Route($url,$action) ;
    }

    /**
     * enregister une route dans POST
     */
    public function post($url,$action) {
        $this->routes['POST'][] = new Route($url,$action) ;
    }


    /**
     * commencer a rechercher tout les route existants et comparer avec le $url_request de utilisateur
     */
    public function run($url_request) {
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->matches(trim($url_request,'/'))) {
                return $route->execute();
            }
        }

        return header('HTTP/1.0 404 Not Found');
    }
}
