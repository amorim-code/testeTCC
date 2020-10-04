<?php

namespace application\controllers;

use application\models\Usuario;
use application\core\Controller;


class Login extends Controller
{    
    public function __construct()
    {         
        $user = new Usuario;
                
        if(empty($_SESSION['usuario']))
	    {
            $this->index();          
        }
        else
        {                       
          $user->verifyPerm($_SESSION['cargo']);
        }
              
        

        //$this->load();
    }

    public function index()
    {
        
        echo "index";
    }

    public function indexManager()
    {
        echo "indexManager";
    }
    
    function indexTeach()
    {
        echo "indexManager";
    }

    public function indexStudy()
    {
        echo "indexManager";
    }



}