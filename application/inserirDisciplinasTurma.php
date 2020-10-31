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

        //read pra poder mostrar todas as disciplinas disponíveis
        $lerDisciplina = new Read();
        $lerDisciplina->ExeRead('disciplina');

        //read apenas pra pegar quantos registros tem no banco, sabendo os registros dá pra pegar o último ID cadastrado
        $lerTurma = new Read();
        $lerTurma->ExeRead('turma');

        $id = $lerTurma->getRowCount();
        $id = 1; //problema do ID, ainda tô pensando em um jeito de pegar o último ID cadastrado sem precisar contar os registros do banco
        echo $id;

        //read pra pegar o nome, semestre e ano do último ID
        $lerUltimaTurma = new Read();
        $lerUltimaTurma->FullRead("SELECT * FROM turma WHERE cod_turma = {$id}");


        //read na tabela turma_disciplina, pra mostrar quais disciplinas já estão linkadas à turma
        $lerDiscipinasDaTurma = new Read();
        $lerDiscipinasDaTurma->FullRead("SELECT d.codDisciplina, d.nomeDisciplina, d.siglaDisciplina FROM disciplina AS d INNER JOIN turma_disciplina AS td ON d.codDisciplina = td.codDisciplina INNER JOIN turma AS t ON td.codTurma = t.cod_turma WHERE t.cod_turma = {$id}");
        ?>
        <h1>INSERIR DISCIPLINAS NA TURMA</h1><hr>
        <label>Turma:</label>
        <p>
            <?php echo $lerUltimaTurma->getResult()[0]['nome_turma'] . " - " . $lerUltimaTurma->getResult()[0]['semestre_turma'] . "/" . $lerUltimaTurma->getResult()[0]['ano_turma']; ?>
        </p>
        <label>Disciplinas:</label>
        <input type="text" name="txtDisciplinasTurma" id="txtDisciplinasTurma"><br>
        <p>Selecione:</p>
        <table>
            <?php
            //Aqui onde são mostradas todas as disciplinas cadastradas no banco, caso clicado no link a página addDisciplinaTurma adiciona essa disciplina na turma em questão.
            if ($lerTurma->getRowCount() >= 1):
                for ($i = 0; $i < $lerDisciplina->getRowCount(); $i++):
                    echo "<tr>";
                    echo "<td value='{$lerDisciplina->getResult()[$i]["codDisciplina"]}'><a href='addDisciplinaTurma.php?idDisc={$lerDisciplina->getResult()[$i]["codDisciplina"]}'>{$lerDisciplina->getResult()[$i]["nomeDisciplina"]} - {$lerDisciplina->getResult()[$i]["siglaDisciplina"]}</a></td>";
                    echo "</tr>";
                endfor;
            endif;
            ?>
        </table>
    </div>
    <div>
        <p>Disciplinas selecionadas:</p>
        <table>
            <tr>
                <?php
                //Aqui são mostradas as disciplinas já linkadas com a turma. Caso clicado no link a página removeDisciplinaTurma remove essa disciplina da turma em questão. 
                if ($lerDiscipinasDaTurma->getRowCount() >= 1):
                    for ($i = 0; $i < $lerDiscipinasDaTurma->getRowCount(); $i++):
                        echo "<tr>";
                        echo "<td value='{$lerDiscipinasDaTurma->getResult()[$i]["codDisciplina"]}'><a href='removeDisciplinaTurma.php?idDisc={$lerDiscipinasDaTurma->getResult()[$i]["codDisciplina"]}'>{$lerDiscipinasDaTurma->getResult()[$i]["nomeDisciplina"]} - {$lerDiscipinasDaTurma->getResult()[$i]["siglaDisciplina"]}</a></td>";
                        echo "</tr>";
                    endfor;
                endif;
                ?>
            </tr>
        </table>
        <a href="inicioGestor.php"><button>Concluir</button></a>
    </div>
</body>
</html>
