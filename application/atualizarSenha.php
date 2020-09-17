<!DOCTYPE html>
<html lang="pt-br">
  <head>
    
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <title>Faça login!</title>
  </head>
  <body>
    <div class="wrapper">
      <div class="half-one">
        <img src="img/helpp.png" class="logo"></img>
      </div>
      <div class="half-two">
        <form class="frmLogin" method="POST">
          <div class="form">
            <h1 class="tituloForm">REDEFINIR SENHA</h1><br/>
            <label for="txtSenha" id="lblSenha" class="lblSenha"></label>
            <input type="password" class="txtSenha2" placeholder="Senha" name="txtSenha" id="txtSenha" required>
            <label for="txtSenha2" id="lblSenha2" class="lblSenha2"></label>
            <input type="password" class="txtSenha2" placeholder="Confirme a Senha" name="txtSenha" id="txtSenha2" required><br/>  
            <input type="submit" class="btnEntrar2" value="Entrar"><br/><br/>
          </div>
        </form>
      </div>
      <p class="divisoria"></p>
    </div>
      <footer>
        <img src="img/rodape.png" class="rodape"></img>
        <p class="copy">Copyright © 2020 CrownTech. Todos os direitos reservados.</p>
      </footer>
      <div class="modal-container" id="modal-aviso">
        <div class="modal">
          <h3 class="tituloModal">Opa!</h3><br/>
          <span>Você precisa atualizar sua senha!</span>
          <button class="botao">OK!</button>
        </div>
      </div>
      <script src="js/app.js"></script>
  </body>
</html>
