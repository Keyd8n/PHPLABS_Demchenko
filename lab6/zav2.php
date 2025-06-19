<?php
// Налаштування підключення до бази даних
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Library";

// Створення нового з'єднання з базою даних
$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка з'єднання
if ($conn->connect_error) {
    die("Помилка з'єднання: " . $conn->connect_error);
}

$message = ""; // Змінна для повідомлень користувачу

// Обробка форми при POST-запиті
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Отримання та очищення даних з форми
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $date = $_POST["date"];

    // Перевірка, чи існує вже користувач з таким email
    $check_sql = "SELECT id FROM Members WHERE email = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Якщо email вже існує - виводимо помилку
        $message = "<div class='alert alert-danger'>Цей email вже існує!</div>";
    } else {
        // Якщо email унікальний - додаємо нового члена до таблиці Members
        $insert_sql = "INSERT INTO Members (member_name, email, membership_date) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insert_sql);
        $stmt->bind_param("sss", $name, $email, $date);
        if ($stmt->execute()) {
            // Успішне додавання
            $message = "<div class='alert alert-success'>Члена бібліотеки додано успішно!</div>";
        } else {
            // Виведення помилки, якщо вставка не вдалася
            $message = "<div class='alert alert-danger'>Помилка: " . $conn->error . "</div>";
        }
    }
    $stmt->close(); // Закриття підготовленого виразу
}
$conn->close(); // Закриття з'єднання з базою даних
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Додати члена</title>
    <!-- Підключення Bootstrap CSS для стилів -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4 text-center">Додати нового члена бібліотеки</h2>
    <!-- Виведення повідомлень про результат додавання -->
    <?= $message ?>
    <!-- Форма для додавання нового члена бібліотеки -->
    <form method="post" class="bg-white p-4 rounded shadow-sm">
        <div class="mb-3">
            <label class="form-label">Ім'я</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Дата реєстрації</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Додати</button>
        <a href="index.php" class="btn btn-secondary">На головну</a>
    </form>
</div>
</body>
</html>
