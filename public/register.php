<?php
    session_start();
    if (isset($_SESSION['user'])) {
        header('Location: profile.php');
    }
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
    <header>
        <span class="logo">БТСИиЭ</span>
    </header>
    <form class="container" action="vendor/signup.php" method="post" enctype="multipart/form-data">
        <label>ФИО:</label>
        <input type="text" name="full_name" placeholder="Иванов Иван Иванович">
        <label>Логин:</label>
        <input type="text" name="login" placeholder="Придумайте себе красивый логин">
        <label>Почта:</label>
        <input type="email" name="email" placeholder="Пример: example@gmail.com">
        <label>Изображение профиля:</label>
        <input type="file" name="avatar">
        <label>Пароль:</label>
        <input type="password" name="password" placeholder="Придумайте надежный пароль">
        <label>Подтверждение пароля:</label>
        <input type="password" name="password_confirm" placeholder="Повторите пароль">
        <button type="submit">Зарегестрируйтесь</button>
        <p>
            Уже есть аккаунт? - <a href="/auth.php">Войдите!</a>
        </p>--
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