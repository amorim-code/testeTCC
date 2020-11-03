<?php
        require('../application/config/config.php');
        require('../application/config/Conn.class.php');
        require('../application/models/Create.class.php');
        require('../application/models/Turma.class.php');
        require('../application/models/TurmaDAO.class.php'); 
        
        $nomeTurma = $_POST['txtNomeTurma'];
        $semestreTurma = $_POST['txtSemestreTurma'];
        $cursoTurma = $_POST['curso'];
        $anoTurma = $_POST['txtAnoTurma'];
        
        $turma = new Turma();
        
        $turma->setNomeTurma($nomeTurma);
        $turma->setSemestreTurma($semestreTurma);
        $turma->setAnoTurma($anoTurma);
        $turma->setCodCurso($cursoTurma);
        
        echo $nomeTurma, "<hr>", $semestreTurma,"<hr>", $cursoTurma,"<hr>";
        
        $turmaDAO =  new TurmaDAO();
        $turmaDAO->cadastrar($turma);
        
        if($turmaDAO->getResult()):
            echo "Turma cadastrada com sucesso!";
        endif;
        
//        header("location:inserirDisciplinasTurma.php");

?>

