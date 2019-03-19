<?php
    $host = 'localhost';
    $dbname = 'articles';
    $username = 'root';
    $password = 'root';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

        // if (isset($_POST["title"]) && isset($_POST["content"])) {
        //     $sql = "INSERT INTO articles(title, content) VALUES (:title, :content)";

        //     $stmt = $pdo->prepare($sql);
        //     $stmt->bindValue(':title', $_POST['title']);
        //     $stmt->bindValue(':content', $_POST['content']);
        //     $stmt->execute();
        // return;
        // }

        $sql = 'SELECT title, content FROM articles';
     
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Could not connect to the database $dbname :" . $e->getMessage());
    }
    ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Blog</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <div id="container">
            <h1>Blog</h1>
            <form action="" method="POST">
                <input type="text" name="title" placeholder="titre">
                <input type="text" name="content" placeholder="contenu">
                <button type="submit" name="add">Publier</button>
            </form>
            <ul style="list-style: none; padding: 0;">
            <?php while ($row = $q->fetch()): ?>
                <li style="border-bottom: 1px solid black; margin: 5px; padding: 10px;">
                    <p><?php echo htmlspecialchars($row['title']) ?></p>
                    <p><?php echo htmlspecialchars($row['content']); ?></p>
                    <button>Editer</button>
                    <button>Supprimer</button>
                </li>
            <?php endwhile; ?>
            <ul>
        </div>   
    </body>
</div>
</html>