<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>

<body>
    <header>
        <span class="logo">БТСИиЭ</span>
        <nav>
            <ul>
                <li><a href="index.php">Найти диплом</a></li>
                <li><a href="../profile.php">Профиль</a></li>
                <li><a href="https://github.com/tHere1sh0p3/Archive-Diplom">GitHub</a></li>
                <li><a href="contacts.html">О нас</a></li>
            </ul>
        </nav>
    </header>
    <?php
    session_start();
    require_once 'db_connect.php';

    $query = $_GET['query'];

    $sql = "SELECT * FROM diplomas WHERE student_name LIKE '%$query%' OR diploma_title LIKE '%$query%'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='diploma'>";
            echo "<p><strong>Студент:</strong> " . $row["student_name"] . "</p>";
            echo "<p><strong>Название диплома:</strong> " . $row["diploma_title"] . "</p>";
            echo "<a href='" . $row["file_path"] . "'>Скачать диплом</a>";
            echo "</div>";
        }
    } else {
        $_SESSION['message'] = 'Совпадений не найдено.';
        header('Location: ../index.php');
    }
    $connect->close();
    ?>
</body>

</html>