<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /auth.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>

    <!-- Профиль -->

    <form>
        <header>
            <span class="logo">БТСИиЭ</span>
            <nav>
                <ul>
                    <li><a href="index.php">Найти диплом</a></li>
                    <li><a href="profile.php">Профиль</a></li>
                    <li><a href="https://github.com/tHere1sh0p3/Archive-Diplom">GitHub</a></li>
                    <li><a href="contacts.html">О нас</a></li>
                </ul>
            </nav>
        </header>
        <div class="container">
            <img src="<?= $_SESSION['user']['avatar'] ?>" width="200" alt="">
        <h2 style="margin: 10px 0;"><?= $_SESSION['user']['full_name'] ?></h2>
        <a href="#"><?= $_SESSION['user']['email'] ?></a>
        <a href="vendor/logout.php" class="logout">Выход</a>
        </div>
        
    </form>

</body>

</html>