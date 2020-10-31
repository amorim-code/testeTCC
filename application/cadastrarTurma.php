<?php
        require('../application/config/config.php');
        require('../application/config/Conn.class.php');
        require('../application/models/Create.class.php');
        
        $nomeTurma = $_POST['txtNomeTurma'];
        $semestreTurma = $_POST['txtSemestreTurma'];
        $cursoTurma = $_POST['curso'];
        $anoTurma = $_POST['txtAnoTurma'];
        
        
        echo $nomeTurma, "<hr>", $semestreTurma,"<hr>", $cursoTurma,"<hr>";
        
        $Dados = ["cod_curso" => $cursoTurma, "nome_turma" => $nomeTurma, "semestre_turma" => $semestreTurma, "ano_turma" => $anoTurma];
        
        //CREATE NÃO FUNCIONANDO, precisa arrumar o auto incremento que aparentemente não está funcionando
        $create = new Create();
        $create->ExeCreate('turma', $Dados);
        echo mysqli_insert_id($create);
        
        echo "<pre>";
        var_dump($create);
        echo "</pre>";
        
        
//        header("location:inserirDisciplinasTurma.php");

?>

