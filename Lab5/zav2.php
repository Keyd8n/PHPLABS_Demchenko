<?php
function hasUppercase($text) {
    return preg_match('/[A-ZА-Я]/u', $text);
}

$result = null;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['text'])) {
    $text = $_POST['text'];
    $result = hasUppercase($text) ? "Текст містить великі літери" : "Текст не містить великих літер";
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Перевірка на великі літери</title>
</head>
<body>
    <form method="POST">
        <label>Введіть текст:</label>
        <input type="text" name="text" required>
        <button type="submit">Перевірити</button>
    </form>
    <?php if ($result !== null): ?>
        <p><?= htmlspecialchars($result) ?></p>
    <?php endif; ?>
</body>
</html>
