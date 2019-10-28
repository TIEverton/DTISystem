<?php
    define('HOST','localhost');
    define('USER','root');
    define('PASS','');
    define('BASE','dtisystem');

    $conecta = new PDO('mysql:host=' . HOST . ';dbname=' . BASE . ';' , USER, PASS);
?>
