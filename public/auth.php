

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
    <header>
        <span class="logo">БТСИиЭ</span>
    </header>
    <form class="container" action="vendor/signin.php" method="post">

        <label>Логин:</label>
        <input type="text" name="login" placeholder=" Введите свой логин">
        <label>Пароль:</label>
        <input type="password" name="password" placeholder=" Введите свой пароль">
        <button type="submit">Войти</button>
        <p>
            У вас нет аккаунта? - <a href="/register.php">Зарегестрируйтесь!</a>
        </p>
        <?php
        session_start();
        if (isset($_SESSION['message'])) {
            echo '<p class="msg">' . $_SESSION['message'] . '</p>';
        }
        unset($_SESSION['message']);
        ?>
    </form>

</body>

</html>