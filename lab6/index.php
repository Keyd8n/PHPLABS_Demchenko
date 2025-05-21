<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Бібліотека</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="text-center mb-4">
        <h1 class="display-5">Бібліотечна система</h1>
        <p class="lead">Управління членами бібліотеки</p>
    </div>

    <div class="alert alert-secondary text-center">
        <strong>Лабораторна робота №06:</strong> Взаємодія з MySQL. CRUD операції.<br>
        <strong>Варіант 7</strong><br>
        Виконав студент групи <strong>KN1-B22</strong><br>
        <strong>Демченко Дмитро</strong>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <h5 class="card-title">Додати нового члена</h5>
                    <p class="card-text">Додайте нового користувача до бази даних.</p>
                    <a href="zav2.php" class="btn btn-primary">Перейти</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <h5 class="card-title">Нові члени</h5>
                    <p class="card-text">Переглянути зареєстрованих за останній місяць.</p>
                    <a href="zav3.php" class="btn btn-success">Переглянути</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
