<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Cadastro Turmas</title>
    </head>
    <body>
        <?php
        require('../application/config/config.php');
        require('../application/config/Conn.class.php');
        require('../application/models/Read.class.php');

        $lerCurso = new Read();
        $lerCurso->ExeRead('curso');
        
        ?>
        <h1>CADASTRAR TURMAS</H1><hr>
        <form class="cadastroTurma" method="POST" action="cadastrarTurma.php">
            <div class="form">
                <label for="lblNomeTurma" id="lblNomeTurma">Nome da Turma:</label>
                <input type="text" name="txtNomeTurma" id="txtNomeTurma"><br>
                <label for="lblSemestreTurma" id="lblSemestreTurma">Semestre da Turma:</label>
                <input type="text" name="txtSemestreTurma" id="txtSemestreTurma"><br>                
                <label for="lblAnoTurma" id="lblAnoTurma">Ano da Turma:</label>
                <input type="text" name="txtAnoTurma" id="txtAnoTurma"><br>
                <label for="txtCursoTurma" id="lblCursoTurma">Curso da Turma:</label>
                <select name="curso" id="cmbCurso" name="cmbCurso">
                    <?php
                    if ($lerCurso->getRowCount() >= 1):
                        for ($i = 0; $i < $lerCurso->getRowCount(); $i++):
                            echo "<option value='{$lerCurso->getResult()[$i]["cod_curso"]}'>{$lerCurso->getResult()[$i]["nome_curso"]}</option>";
                        endfor;
                    endif;
                    ?>
                </select><br/>
                <input type="submit" class="btnCadastro" value="Cadastrar"><br/>
        </form>

    </body>
</html>
