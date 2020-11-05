<?php

require('../application/config/config.php');
require('../application/config/Conn.class.php');
require('../application/models/Create.class.php');
require('../application/models/Disciplina.class.php');
require('../application/models/DisciplinaDAO.class.php');

$nomeDisciplina = $_POST['txtNomeDisciplina'];
$siglaDisciplina = $_POST['txtSiglaDisciplina'];
$elementos = $_POST['elementos'];

$disciplina = new Disciplina();

$disciplina->setNomeDisciplina($nomeDisciplina);
$disciplina->setSiglaDisciplina($siglaDisciplina);

foreach ($elementos as $e):
    $disciplina->setCodTurma($e);

    $disciplinaDAO = new DisciplinaDAO();
    $disciplinaDAO->cadastrar($disciplina);

//    if ($disciplinaDAO->getResultado()):
//        echo "Disciplina cadastrada com sucesso!";
//    endif;
endforeach;

