<?php

require('../application/config/config.php');
require('../application/config/Conn.class.php');
require('../application/models/Read.class.php');
require('../application/models/Delete.class.php');

//Preciso de um jeito de pegar o último ID cadastrado sem ler a qntd de campos
$lerTurma = new Read();
$lerTurma->ExeRead('turma');
$cod = $lerTurma->getRowCount();
$cod = 1;

if (isset($_GET['idDisc'])):
    $idDisciplina = $_GET['idDisc'];
    
    $deletarDiscTurma = new Delete();

    $deletarDiscTurma->ExeDelete('turma_disciplina', 'WHERE codTurma = :codTurma AND codDisciplina = :idDisciplina', "&codTurma={$cod}&idDisciplina={$idDisciplina}");

    header("location:inserirDisciplinasTurma.php");

else:
    $idDisciplina = null;
    endif;



?>

