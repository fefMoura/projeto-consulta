<?php
    require_once 'model.php';
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $v=$_POST['cx_velocidade'];
        $t=$_POST['cx_tempo'];
        $distancia=calculardistancia::calcula($v,$t);
        include 'view.php';

    }

?>