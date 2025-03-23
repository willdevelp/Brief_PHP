<?php
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=projet_brief","root","",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    } catch (PDOException $e) {
        echo" Une erreur". $e->getMessage();
    }
?>