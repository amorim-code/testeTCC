<?php
        require('../application/config/config.php');
        require('../application/config/Conn.class.php');
        require('../application/models/Update.class.php');
        require('../application/models/Disciplina.class.php');
        require('../application/models/DisciplinaDAO.class.php');
        
        $idDisciplina=$_POST['txtIdDisciplina'];
        $nomeDisciplina = $_POST['txtNomeDisciplina'];
        $siglaDisciplina = $_POST['txtSiglaDisciplina'];
        
        $disciplina = new Disciplina();
        $disciplinaDAO = new DisciplinaDAO();
        
        $disciplina->setCodDisciplina($idDisciplina);
        $disciplina->setNomeDisciplina($nomeDisciplina);
        $disciplina->setSiglaDisciplina($siglaDisciplina);
        
        $disciplinaDAO->alterar($disciplina);
        
        header("location:gerenciarDisciplina.php");
        
        
