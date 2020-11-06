<?php
    require_once ('../vendor/autoload.php');
    require_once ('../application/config/config.php');
    

    $routerControl = new \application\core\RouterControl;
    $routerControl->start($_GET);
    $routerControl->load();