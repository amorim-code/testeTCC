<?php

    $this->get('/', function () {
        (new \application\controllers\Login);
    });
    $this->get('/cep', 'PagesController@cep');
    $this->get('/quem-somos', 'PagesController@quemSomos');
    $this->get('/contato', 'PagesController@contato');