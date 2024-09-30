<?php

namespace Stdev\Framework\Route ;

use Stdev\Framework\Config\DBConnection;

class Route 
{
    public $path ;
    public $action ;
    public $matches ;

    public function __construct($path,$action) {
        $this->path = trim($path,"/") ;
        $this->action = $action ;
    }

    /**
     * verifie si le path de cette objet est la  meme avec url de requette utilisateur 
     */
    public function matches($url) {
        $path = preg_replace('#:([\w]+)#', '([^/]+)',$this->path);
        $pathToMatch = "#^$path$#";
        if (preg_match($pathToMatch,$url,$matches)) {
            $this->matches = $matches;
            return true ;
        }else{
            return false ;
        }
    }

    /**
     * execute la methode du controller de cette objet avec ou sans parametre
     */
    public function execute(){
        $params = explode('@',$this->action);
        $controller = new $params[0](new DBConnection('stdev','127.0.0.1','root','')) ;
        $method = $params[1];

        return isset($this->matches[1]) ? $controller->$method($this->matches[1]) : $controller->$method() ;
    }
}
