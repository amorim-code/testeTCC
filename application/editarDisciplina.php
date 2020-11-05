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
        require('../application/models/Disciplina.class.php');
        require('../application/models/DisciplinaDAO.class.php');
        
        if (isset($_GET['ID'])):
            $idDisciplina = $_GET['ID'];
        
            $lerDisciplina = new DisciplinaDAO();
            $query = "SELECT * FROM disciplina WHERE codDisciplina = {$idDisciplina}";
            $lerDisciplina->consultar($query);
            
        else:
            $idDisciplina = null;
        endif;
        ?>
        <H1>Editar Disciplina</h1>
        <form class="editarDisciplina" method="POST" action="editDisciplina.php">
            <?php  foreach ($lerDisciplina->consultar($query) AS $disciplina); ?>
            <input type="hidden" name="txtIdDisciplina" id="txtIdDisciplina" value="<?php echo $idDisciplina ?>"><br>
            <label for="nomeDisciplina" id="nomeDisciplina">Nome da Disciplina:</label>
            <input type="text" name="txtNomeDisciplina" id="txtNomeDisciplina" value="<?php echo $disciplina["nomeDisciplina"]; ?>"><br>
            <label for="siglaDisciplina" id="siglaDisciplina">Sigla da Disciplina:</label>
            <input type="text" name="txtSiglaDisciplina" id="txtSiglaDisciplina" value="<?php echo $disciplina["siglaDisciplina"]; ?>"><br>
            <button type="submit">Alterar</button>
        </form>
    </body>
</html>
