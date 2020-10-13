<?php

    $this->get('/oi', function () {
        (new \application\controllers\Login);
    });
    $this->get('/cep', function () {
        echo 'aquii';
    });
    $this->get('/quem-somos', 'PagesController@quemSomos');
    $this->get('/contato', 'PagesController@contato');