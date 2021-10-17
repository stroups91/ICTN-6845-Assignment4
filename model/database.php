<?php
    $dsn = 'mysql:host=localhost;dbname=id17695512_assignment3';
    $username = 'id17695512_mgs_user';
    $password = '&W-e]6{]>??/$#vt';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('./errors/database_error.php');
        exit();
    }
?>