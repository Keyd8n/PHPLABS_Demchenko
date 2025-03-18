<?php
function factorial($n) {
    if ($n < 0) return "Факторіал не визначений для від’ємних чисел";
    if ($n == 0) return 1;
    $fact = 1;
    for ($i = 1; $i <= $n; $i++) {
        $fact *= $i;
    }
    return $fact;
}

$result = null;
if (isset($_GET['number'])) {
    $num = intval($_GET['number']);
    $result = factorial($num);
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обчислення факторіала</title>
</head>
<body>
    <form method="GET">
        <label>Введіть число:</label>
        <input type="number" name="number" required>
        <button type="submit">Обчислити</button>
    </form>
    <?php if ($result !== null): ?>
        <p>Факторіал: <?= htmlspecialchars($result) ?></p>
    <?php endif; ?>
</body>
</html>
