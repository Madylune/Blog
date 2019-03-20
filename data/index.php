<?php
require('./config.php');

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

        $sql = 'SELECT * FROM articles';
    
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
            <form action="save.php" method="POST">
                <input type="text" name="title" placeholder="titre">
                <input type="text" name="content" placeholder="contenu">
                <button type="submit" name="add">Publier</button>
            </form>
            <ul style="list-style: none; padding: 0;">
            <?php while ($row = $q->fetch()): ?>
                <li style="border-bottom: 1px solid black; margin: 5px; padding: 10px;">
                    <p><strong><?php echo htmlspecialchars($row['title']) ?></strong></p>
                    <p><?php echo htmlspecialchars($row['content']); ?></p>
                    <a href="delete.php?del=<?php echo $row['id']; ?>" style="color: red; text-decoration: none;">Supprimer</a>
                </li>
            <?php endwhile; ?>
            <ul>
        </div>   
    </body>
</div>
</html>