<?php
    $username = "root";
    $password = "root";

    try {
        $conn = new PDO("mysql:host=todo_db;dbname=todo", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        return null;
    }

?>
