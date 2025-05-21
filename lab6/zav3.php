<?php
// Налаштування підключення до бази даних
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Library";

// Створення з'єднання з базою даних
$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка з'єднання
if ($conn->connect_error) {
    die("Помилка з'єднання: " . $conn->connect_error);
}

// SQL-запит для вибірки членів, які зареєстровані за останній місяць,
// відсортовані за датою реєстрації у спадному порядку
$sql = "SELECT member_name, email, membership_date 
        FROM Members 
        WHERE membership_date >= CURDATE() - INTERVAL 1 MONTH
        ORDER BY membership_date DESC";

// Виконання запиту
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Нові члени</title>
    <!-- Підключення Bootstrap CSS для стилізації -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4 text-center">Члени, зареєстровані за останній місяць</h2>

    <?php if ($result->num_rows > 0): // Якщо є результати ?>
        <div class="table-responsive bg-white p-4 rounded shadow-sm">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Ім'я</th>
                        <th>Email</th>
                        <th>Дата реєстрації</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // Вивід кожного рядка результату в таблицю
                    while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <!-- Використання htmlspecialchars для безпечного виводу -->
                            <td><?= htmlspecialchars($row['member_name']) ?></td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <td><?= $row['membership_date'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php else: // Якщо записів немає ?>
        <div class="alert alert-info">Немає нових членів за останній місяць.</div>
    <?php endif; ?>

    <div class="mt-3">
        <!-- Кнопка для повернення на головну сторінку -->
        <a href="index.php" class="btn btn-secondary"> На головну</a>
    </div>
</div>
</body>
</html>

<?php
// Закриття з'єднання з базою даних
$conn->close();
?>
