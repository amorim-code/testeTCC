<?php
        require('../application/config/config.php');
        require('../application/config/Conn.class.php');
        require('../application/models/Update.class.php');
        require('../application/models/Turma.class.php');
        require('../application/models/TurmaDAO.class.php');
        
        $idTurma =$_POST['txtIdTurma'];
        $nomeTurma = $_POST['txtNomeTurma'];
        $semestreTurma = $_POST['txtSemestreTurma'];
        $cursoTurma = $_POST['curso'];
        $anoTurma = $_POST['txtAnoTurma'];
       
        $turma = new Turma();
        $turmaDAO = new TurmaDAO();
        
        $turma->setCodTurma($idTurma);
        $turma->setNomeTurma($nomeTurma);
        $turma->setSemestreTurma($semestreTurma);
        $turma->setAnoTurma($anoTurma);
        $turma->setCodCurso($cursoTurma);
        
        $turmaDAO->alterar($turma);
        
        header("location:gerenciarTurma.php");

//        echo "<pre>";
//        var_dump($alterarTurma);
//        echo "</pre>";
        