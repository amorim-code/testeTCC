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
        require('../application/models/TurmaDAO.class.php');

        /*$lerTurma = new Read();
        $lerTurma->FullRead("SELECT t.cod_turma, t.nome_turma, t.semestre_turma, t.ano_turma, c.nome_curso FROM turma AS t INNER JOIN curso AS c ON t.cod_curso = c.cod_curso");*/
        
//        echo "<pre>";
//        var_dump($lerTurma);
//        echo "</pre>";
        
        $turmaDAO = new TurmaDAO();
        
        ?>
        <table border = '1'>
            <tr>
                <td>Nome:</td>
                <td>Semestre:</td>
                <td>Ano:</td>
                <td>Curso:</td>
                <td>Ação:</td>
                <td>Ação:</td>
            </tr>
            <?php
            //if ($turmaDAO->getRowCount() >= 1):
                $query = "SELECT t.cod_turma, t.nome_turma, t.semestre_turma, t.ano_turma, c.nome_curso FROM turma AS t INNER JOIN curso AS c ON t.cod_curso = c.cod_curso";
                foreach ($turmaDAO->consultar($query) as $turma):
                    echo "<tr>";
                    echo "<td>{$turma["nome_turma"]}</td>";
                    echo "<td>{$turma["semestre_turma"]}</td>";
                    echo "<td>{$turma["ano_turma"]}</td>";
                    echo "<td>{$turma["nome_curso"]}</td>";
                    echo "<td><a href='editarTurma.php?ID={$turma["cod_turma"]}'>Editar</a></td>";
                    echo "<td><a href='excluirTurma.php?ID={$turma["cod_turma"]}'>Excluir</a></td>";
                    echo "</tr>";
                endforeach;
            //endif;
            ?>
        </table>
    </body>
</html>
