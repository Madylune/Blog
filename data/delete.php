<?php
    require('./config.php');

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

        if (isset($_GET['del'])) {
            $id = $_GET['del'];
            $sql = "DELETE FROM articles WHERE id=$id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            header('location: index.php');
        }
    } catch (PDOException $e) {
        die("Could not connect to the database $dbname :" . $e->getMessage());
    }
?> 