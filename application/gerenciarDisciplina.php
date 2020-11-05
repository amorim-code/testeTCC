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
            require('../application/models/Disciplina.class.php');
            require('../application/models/DisciplinaDAO.class.php');
        ?>
        <h1>Gerenciar Disciplinas</h1>
        <table border = '1'>
            <tr>
                <td>Nome:</td>
                <td>Sigla:</td>
                <td>Turma:</td>
                <td>Ação:</td>
                <td>Ação:</td>
            </tr>            
            <?php
            //if ($turmaDAO->getRowCount() >= 1):
            $disciplinaDAO = new DisciplinaDAO();
            $query = "SELECT * FROM disciplina";

            foreach ($disciplinaDAO->consultar($query) AS $disciplina):
                echo "<td>" . $disciplina["nomeDisciplina"] . "</td>";
                echo "<td>" . $disciplina["siglaDisciplina"] . "</td>";
                $query2 = "SELECT t.nome_turma FROM turma AS t INNER JOIN disciplina d ON t.cod_turma = d.codTurma WHERE d.codDisciplina = {$disciplina["codDisciplina"]}";
                if ($disciplinaDAO->consultar($query2) > 1):
                    foreach ($disciplinaDAO->consultar($query2) AS $turma):
                        echo "<td>" . $turma["nome_turma"] . "</td>";
                    endforeach;
                    echo " <td><a href=editarDisciplina.php?ID={$disciplina["codDisciplina"]}>Editar</a></td>";
                    echo "<td><a href=#>Excluir</a></td>";
                endif;
                echo "</tr>";
            endforeach;

            //endif;
            ?>
        </table>
    </body>
</html>
