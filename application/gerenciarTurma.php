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
        $lerTurma->FullRead("SELECT t.cod_turma, t.nome_turma, t.semestre_turma, t.ano_turma, c.nome_curso FROM turma AS t INNER JOIN curso AS c ON t.cod_curso = c.cod_curso");

//        echo "<pre>";
//        var_dump($lerTurma);
//        echo "</pre>";
        
        ?>
        <table>
            <tr>
                <td>Nome:</td>
                <td>Semestre:</td>
                <td>Ano:</td>
                <td>Curso:</td>
                <td>Ação:</td>
                <td>Ação:</td>
            </tr>
            <?php
            if ($lerTurma->getRowCount() >= 1):
                for ($i = 0; $i < $lerTurma->getRowCount(); $i++):
                    echo "<tr>";
                    echo "<td>{$lerTurma->getResult()[$i]["nome_turma"]}</td>";
                    echo "<td>{$lerTurma->getResult()[$i]["semestre_turma"]}</td>";
                    echo "<td>{$lerTurma->getResult()[$i]["ano_turma"]}</td>";
                    echo "<td>{$lerTurma->getResult()[$i]["nome_curso"]}</td>";
                    echo "<td><a href='editarTurma.php?ID={$lerTurma->getResult()[$i]["cod_turma"]}'>Editar</a></td>";
                    echo "<td><a href='excluirTurma.php?ID={$lerTurma->getResult()[$i]["cod_turma"]}'>Excluir</a></td>";
                    echo "</tr>";
                endfor;
            endif;
            ?>
        </table>
    </body>
</html>
