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

        $lerTurma = new Read();
        $lerTurma->ExeRead('turma');
        ?>
        <h1>CRIAR DISCIPLINA</h1>
        <form class="cadastroDisciplina" method="POST" action="criandoDisciplina.php">
            <label for="nomeDisciplina" id="nomeDisciplina">Nome da Disciplina:</label>
            <input type="text" name="txtNomeDisciplina" id="txtNomeDisciplina"><br>
            <label for="siglaDisciplina" id="siglaDisciplina">Sigla da Disciplina:</label>
            <input type="text" name="txtSiglaDisciplina" id="txtSiglaDisciplina"><br>
            <h2>Turmas para inserir a disciplina:</h2>
            <table>
                <tr>
                    <?php
                    if ($lerTurma->getRowCount() >= 1):
                        //foreach
//                        foreach ($lerTurma->getResult() as $resultado):
//                            echo "<tr>";
//                            echo "<td><input type='checkbox' value='{$lerTurma->getResult()[$resultado]["cod_turma"]}' name='elementos[]'></td>";
//                            echo "<td>{$lerTurma->getResult()[$resultado]["nome_turma"]}</td>";
//                            echo "</tr>";                        
//                        endforeach;
                        for ($i = 0; $i < $lerTurma->getRowCount(); $i++):
                            echo "<tr>";
                            echo "<td><input type='checkbox' value='{$lerTurma->getResult()[$i]["cod_turma"]}' name='elementos[]'></td>";
                            echo "<td>{$lerTurma->getResult()[$i]["nome_turma"]}</td>";
                            echo "</tr>";
                        endfor;
                    endif;
                    ?>
                </tr>
            </table>
            <button type="submit">Cadastrar</button>
        </form>
    </body>
</html>
