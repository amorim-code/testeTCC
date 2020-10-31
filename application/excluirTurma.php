<?php

require('../application/config/config.php');
require('../application/config/Conn.class.php');
require('../application/models/Delete.class.php');

if (isset($_GET['ID'])):
    $idTurma = $_GET['ID'];
    
    $lerTurma = new Read();
    $lerTurma->ExeRead("SELECT * FROM turma WHERE cod_curso = {$idTurma}");
    
//    echo "<pre>";
//    var_dump($lerTurma);    
//    echo "</pre>";
    

    header("location:gerenciarTurma.php");

else:
    $idTurma = null;
    endif;