<?php

define('BASE', '/testeTCC/');

define('UNSET_URI_COUNT', 1);
define('DEBUG_URI', false);

//*Alteração*: definindo as constantes relacionadas aos dados para fazer a conexão do banco

define('HOST', 'localhost'); //lê a constante quando executar o código. 
define('USER', 'root');
define('PASS', '');
define('DBSA', 'teste_tcc'); //nome do banco

//WSErro :: Exibe erros lançados :: Front
function WSErro($ErrMsg, $ErrNo, $ErrDie = null) {
    $CssClass = ($ErrNo == E_USER_NOTICE ? WS_INFOR : ($ErrNo == E_USER_WARNING ? WS_ALERT : ($ErrNo == E_USER_ERROR ? WS_ERROR : $ErrNo)));
    echo "<p class=\"trigger {$CssClass}\">{$ErrMsg}<span class=\"ajax_close\"></span></p>";

    if ($ErrDie):
        die;
    endif;
}

//Foi criado no curso uma forma uniforme de informar o erro, precisa ter isso pra função GetConn da classe de conexão entender
//o que é a função GetConn
function PHPErro($ErrNo, $ErrMsg, $ErrFile, $ErrLine) {
    $CssClass = ($ErrNo == E_USER_NOTICE ? WS_INFOR : ($ErrNo == E_USER_WARNING ? WS_ALERT : ($ErrNo == E_USER_ERROR ? WS_ERROR : $ErrNo)));
    echo "<p class=\"trigger {$CssClass}\">";
    echo "<b>Erro na Linha: #{$ErrLine} ::</b> {$ErrMsg}<br>";
    echo "<small>{$ErrFile}</small>";
    echo "<span class=\"ajax_close\"></span></p>";

    if ($ErrNo == E_USER_ERROR):
        die;
    endif;
}

?>