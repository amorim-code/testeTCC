<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <?php

        require('../application/config/config.php');
        require('../application/config/Conn.class.php');
        require('../application/models/Read.class.php');

        if (isset($_GET['ID'])):
            $idTurma = $_GET['ID'];
        
        $lerTurma = new Read();
        $lerTurma->FullRead("SELECT t.cod_turma, t.nome_turma, t.semestre_turma, t.ano_turma, c.nome_curso FROM turma AS t INNER JOIN curso AS c ON t.cod_curso = c.cod_curso WHERE cod_turma = {$idTurma}");
        
        $lerCurso = new Read();
        $lerCurso->ExeRead('curso');
        
        else:
            $idTurma = null;
        endif;
        ?>        
        <div>
            <form class="editarTurma" method="POST" action="editTurma.php">
                <input type="hidden" name="txtIdTurma" id="txtIdTurma" value="<?php echo $idTurma ?>"><br>
                <label for="lblNomeTurma" id="lblNomeTurma">Nome da Turma:</label>
                <input type="text" name="txtNomeTurma" id="txtNomeTurma" value="<?php echo $lerTurma->getResult()[0]['nome_turma'] ?>"><br>
                <label for="lblSemestreTurma" id="lblSemestreTurma">Semestre da Turma:</label>
                <input type="text" name="txtSemestreTurma" id="txtSemestreTurma" value="<?php echo $lerTurma->getResult()[0]['semestre_turma'] ?>"><br>                
                <label for="lblAnoTurma" id="lblAnoTurma">Ano da Turma:</label>
                <input type="text" name="txtAnoTurma" id="txtAnoTurma" value="<?php echo $lerTurma->getResult()[0]['ano_turma'] ?>"><br>
                <label for="txtCursoTurma" id="lblCursoTurma">Curso da Turma:</label>
                <select name="curso" id="cmbCurso" name="cmbCurso">
                    <?php
                    if ($lerCurso->getRowCount() >= 1):
                        for ($i = 0; $i < $lerCurso->getRowCount(); $i++):
                            if($lerTurma->getResult()[0]['nome_curso'] == $lerCurso->getResult()[$i]["nome_curso"]):
                                echo "<option value='{$lerCurso->getResult()[$i]["cod_curso"]}' selected>{$lerCurso->getResult()[$i]["nome_curso"]}</option>";
                            else:
                                echo "<option value='{$lerCurso->getResult()[$i]["cod_curso"]}'>{$lerCurso->getResult()[$i]["nome_curso"]}</option>";
                            endif;
                        endfor;
                    endif;
                    ?>
                </select><br>
                <button type="submit">Alterar</button>
        </div>
    </body>
</html>
