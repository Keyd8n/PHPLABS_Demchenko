<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Library";
// Створення з'єднання
$conn = new mysqli($servername, $username, $password);
// Перевірка з'єднання
if ($conn->connect_error) {
 die("Помилка з'єднання: " . $conn->connect_error);
}
// Створення бази даних
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
 echo "База даних створена успішно<br>";
} else {
 echo "Помилка створення бази даних: " . $conn->error;
}
// Використання бази даних
$conn->select_db($dbname);
// Створення таблиці
$sql = "CREATE TABLE IF NOT EXISTS Members (
 id INT AUTO_INCREMENT PRIMARY KEY,
 member_name VARCHAR(10),
 email VARCHAR(50),
 membership_date DATE
)";
if ($conn->query($sql) === TRUE) {
 echo "Таблиця створена успішно<br>";
} else {
echo "Помилка створення таблиці: " . $conn->error;
}
// Додавання даних
$sql = "INSERT INTO Members (member_name, email, membership_date) VALUES
 ('Dima', 'kok@gmail.com', '2025-05-20'),
 ('Anatoliy', 'kok1@gmail.com', '2025-05-20'),
 ('Vlad', 'kok2@gmail.com', '2025-05-20')";
if ($conn->query($sql) === TRUE) {
 echo "Дані успішно додані<br>";
} else {
 echo "Помилка додавання даних: " . $conn->error;
}
$conn->close();
?>