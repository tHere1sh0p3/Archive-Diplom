<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /auth.php');
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Архив дипломов</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
    <header>
        <span class="logo">БТСИиЭ</span>
        <nav>
            <ul>
                <li><a href="load.php">Загрузить диплом</a></li>
                <li><a href="profile.php">Профиль</a></li>
                <li><a href="#">GitHub</a></li>
                <li><a href="contacts.html">О нас</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h1 class="page-name">Архив дипломов</h1>
        <form class="form_input" action="vendor/search.php" method="GET">
            <input type="text" name="query" placeholder="Поиск по имени студента">
            <button class="btn_search" type="submit">Найти</button>
        </form>
        <div class="search-container">
            <?php
            session_start();
            if (isset($_SESSION['message'])) {
                echo '<p class="msg">' . $_SESSION['message'] . '</p>';
            }
            unset($_SESSION['message']);
            ?>
        </div>
    </div>
    </div>
</body>

</html>