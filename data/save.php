<?php
require('./config.php');

try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

        if (isset($_POST["title"]) && isset($_POST["content"])) {
            $sql = "INSERT INTO articles(title, content) VALUES (:title, :content)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':title', $_POST['title']);
            $stmt->bindValue(':content', $_POST['content']);
            $stmt->execute();

            header('Location: index.php');
            exit();
        return;
        }
    } catch (PDOException $e) {
        die("Could not connect to the database $dbname :" . $e->getMessage());
    }