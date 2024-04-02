<?php
        require_once "models/DataBase.php"; 

        if (!isset($_REQUEST['c'])) {
            require_once "controller\Login.php";
            $controller = new Login;
            $controller->main();
        } else {
            $controller = $_REQUEST['c'];
            require_once "controller/" . $controller . ".php";
            $controller = new $controller;
            $action = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'main';
            call_user_func(array($controller, $action));
        }
?>


