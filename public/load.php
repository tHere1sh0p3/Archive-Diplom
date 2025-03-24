<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /auth.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css">
    <title>Document</title>
</head>

<body>
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
    <form class="container" action="vendor/upload.php" method="post" enctype="multipart/form-data">
        <h1 class="page-name">Загрузка диплома</h1>
        <label for="student_name">Имя студента:</label>
        <input type="text" id="student_name" name="student_name" placeholder="ФИО, пример: Иванов Иван Иванович"><br><br>

        <label for="diploma_title">Номер специальности:</label>
        <input type="text" id="diploma_title" name="diploma_title" placeholder="Пример: 09.02.07 Информационные системы и программирование"><br><br>

        <label for="fileToUpload">Выберите pdf-файл диплома:</label>
        <input type="file" name="fileToUpload" id="fileToUpload"><br><br>

        <input type="submit" value="Загрузить диплом" name="submit">
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