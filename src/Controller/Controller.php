<?php
namespace Stdev\Framework\Controller ;

class Controller 
{
    public $db ;
    
    public function __construct($db) {
        $this->db = $db;
    }

    public function view($path,$params=null) {
        ob_start();
        $path = str_replace('.',DIRECTORY_SEPARATOR , $path) ;
        require VIEWS . $path . '.php' ;
        if ($params) {
            $params = extract($params) ;
        }
        $content  = ob_get_clean();
        require VIEWS . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'default.php' ;
    }
}
