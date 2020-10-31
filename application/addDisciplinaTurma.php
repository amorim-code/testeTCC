<?php

require('../application/config/config.php');
require('../application/config/Conn.class.php');
require('../application/models/Read.class.php');
require('../application/models/Create.class.php');

//Preciso de um jeito de pegar o último ID cadastrado sem ler a qntd de campos
$lerTurma = new Read();
$lerTurma->ExeRead('turma');
$id = $lerTurma->getRowCount(); 
$id = 1;

if (isset($_GET['idDisc'])):
    $idDisciplina = $_GET['idDisc'];

    $Dados = ["codTurma" => $id, "codDisciplina" => $idDisciplina];
    
    var_dump($Dados);

    $create = new Create();
    $create->ExeCreate('turma_disciplina', $Dados);

    header("location:inserirDisciplinasTurma.php");

else:
    $idDisciplina = null;
    endif;
    
    