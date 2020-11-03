<?php

require('../application/config/config.php');
require('../application/config/Conn.class.php');
require('../application/models/Delete.class.php');
require('../application/models/Turma.class.php');
require('../application/models/TurmaDAO.class.php');

if (isset($_GET['ID'])):
    $idTurma = $_GET['ID'];
    
    $turmaDAO = new TurmaDAO();
    $turmaDAO->excluir($idTurma);
    
//    echo "<pre>";
//    var_dump($lerTurma);    
//    echo "</pre>";
    

    header("location:gerenciarTurma.php");

else:
    $idTurma = null;
    endif;