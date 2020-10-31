<?php
        require('../application/config/config.php');
        require('../application/config/Conn.class.php');
        require('../application/models/Update.class.php');
        
        $idTurma =$_POST['txtIdTurma'];
        $nomeTurma = $_POST['txtNomeTurma'];
        $semestreTurma = $_POST['txtSemestreTurma'];
        $cursoTurma = $_POST['curso'];
        $anoTurma = $_POST['txtAnoTurma'];
       
        $alterarTurma = new Update();
        
        $Dados = ['nome_turma' => $nomeTurma, 'semestre_turma' => $semestreTurma, 'ano_turma' => $anoTurma, 'cod_curso' => $cursoTurma];
        
        $alterarTurma->ExeUpdate('turma', $Dados, "WHERE cod_turma = :idturma", "idturma={$idTurma}");
        
        header("location:gerenciarTurma.php");

//        echo "<pre>";
//        var_dump($alterarTurma);
//        echo "</pre>";
        