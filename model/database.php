<?php
    /*$dsn = 'mysql:host=localhost;dbname=php05';
    $username = 'PHP05';
    $password = 'GA7AJa8J';*/

    $dsn = 'mysql:host=localhost;dbname=lets_roto';
    $username = 'rotouser';
    $password = 'rotouser';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>
