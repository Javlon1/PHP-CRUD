<?php
    $host = "localhost";
    $db="CRUD";
    $user="root";
    $pass = "";

    try {
        $pdo = new PDO("mysql:host=$host; dbname=$db", $user, $pass);
    } catch (PDOException $error) {
        echo "ошибка соединения с бд ".$error->getMessage();
    }
?>