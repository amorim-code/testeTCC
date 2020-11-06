<!DOCTYPE html>
<html lang="pt-br">
  <head>
    
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../system/css/login.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <title>Faça login!</title>
  </head>
  <body>
    <div class="wrapper">
      <div class="half-one">
          <img src="../system/img/helpp.png" class="logo"></img>
      </div>
      <div class="half-two">
        <form class="frmLogin" method="POST" action="login.php">
          <div class="form">
            <h1 class="tituloForm">LOGIN</h1><br/>
            <label for="txtRM" id="lblRM" class="lblRM"></label>
            <input type="text" class="txtrm" placeholder="RM" name="txtRM" id="txtRM" autofocus autocomplete="off" required>
            <select name="cargo" id="cmbCargo" required>
              <option value="aluno">Aluno</option>
              <option value="professor">Professor</option>
              <option value="gestor">Gestor</option>
            </select><br/>
            <label for="txtSenha" id="lblSenha" class="lblSenha"></label>
            <input type="password" class="txtSenha" placeholder="Senha" name="txtSenha" id="txtSenha" required>  
            <input type="submit" class="btnEntrar" value="Entrar"><br/><br/>
            <a href="#" class="esqueceu-senha">Esqueceu a senha?</a>
          </div>
        </form>
      </div>
      <p class="divisoria"></p>
    </div>
      <footer>
          <img src="../system/img/rodape.png" class="rodape"></img>
        <p class="copy">Copyright © 2020 CrownTech. Todos os direitos reservados.</p>
      </footer>
      
      <script src="../system/js/app.js"></script>
  </body>
</html>
