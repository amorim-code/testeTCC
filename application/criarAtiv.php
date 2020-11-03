<?php
date_default_timezone_set('America/Sao_Paulo');

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/navbar.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet" />
    <title>Criando atividade</title>
    <script src="https://kit.fontawesome.com/43a2aaa0b4.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav id="navbar-helpp">
        <div class="logo">
            <img src="img/helpp.png" />
        </div>
        <ul class="nav-links">
            <li><a href="#" class="inicio"><i class="fas fa-home"></i><span class="spanInicio">Início</span></a></li>
            <li><a href="#" class="ativid"><i class="fas fa-file-alt"></i><span class="spanAtiv">Atividades</span></a></li>
            <li><a href="#" class="config"><i class="fas fa-cog"></i><span class="spanConfig">Configurações</span></a></li>
            <li><a href="#" class="sair"><i class="fas fa-power-off"><span class="spanSair">Sair</span></i></a></li>
            
        </ul>
        <div class="burguer" id="burger">
            <div class="linha1"></div>
            <div class="linha2"></div>
            <div class="linha3"></div>
        </div>
    </nav>
    <div class="wrapper" id="tela">
        <div class="formAtividade">
            <h1 class="tituloForm3">Adicionar atividade</h1>
            <form class="formAtiv">
                <div class="name-section">
                    <input type="text" class="txtNomeAtiv" name="txtNomeAtiv" required>
                    <label for="txtNomeAtiv" class="label-name"> <span class="content-name">Nome:</span></label>
                </div><br />
                <select class="turma">
                    <option value="0">Turma</option>
                </select>
                <div class="desc-section">
                    <input type="text" class="txtDescAtiv" name="txtDescAtiv" required>
                    <label for="txtDescAtiv" class="label-name2"><span class="content-name2">Descrição:</span></label>
                </div><br />
                <select class="modo-entrega">
                    <option value="0">Modo de entrega</option>
                    <option value="1">Online</option>
                    <option value="2">Presencial</option>
                </select>
                <label for="txtprazoEntrega">Prazo de entrega:</label>
                <input type="datetime-local" value="<?php echo date("Y-m-d\T23:59");?>" />
                <div class="upload-arquivo">
                    <label for="upload" class="label" id="label">Selecionar arquivo...</label>
                    <input type="file" name="upload" id="upload">
                    <i class="fas fa-upload"></i>
                </div>
                <input type="submit" class="btnEnviar" value="Enviar"/>
            </form>
        </div>
    </div>
    <script src="js/app.js"></script>
</body>

</html>