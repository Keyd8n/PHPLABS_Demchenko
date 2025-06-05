<?php
$conn = new mysqli("localhost", "root", "", "learning_materials_db");
$materials = $conn->query("
    SELECT materials.id, materials.title, authors.name AS author, categories.name AS category, views
    FROM materials
    JOIN authors ON materials.author_id = authors.id
    JOIN categories ON materials.category_id = categories.id
    ORDER BY materials.id DESC
    LIMIT 10
");
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Бібліотека матеріалів</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Система навчальних матеріалів</h1>
        <nav>
            <a href="add_material.php">➕ Додати матеріал</a>
            <a href="popular_categories.php">📊 Популярні категорії</a>
            <a href="add_author.php">👤 Додати автора</a>
            <a href="add_category.php">📂 Додати категорію</a>

        </nav>

        <h2>Останні матеріали</h2>
        <ul class="material-list">
            <?php while ($m = $materials->fetch_assoc()): ?>
                <li>
                    <strong><a href="view_material.php?id=<?= $m['id'] ?>"><?= htmlspecialchars($m['title']) ?></a></strong><br>
                    Автор: <?= $m['author'] ?> | Категорія: <?= $m['category'] ?> | Перегляди: <?= $m['views'] ?>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
</body>
</html>
