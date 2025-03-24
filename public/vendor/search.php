<?php
require_once 'db_connect.php';

$query = $_GET['query'];

$sql = "SELECT * FROM diplomas WHERE student_name LIKE '%$query%' OR diploma_title LIKE '%$query%'";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='diploma'>";
        echo "<p><strong>Студент:</strong> " . $row["student_name"] . "</p>";
        echo "<p><strong>Название диплома:</strong> " . $row["diploma_title"] . "</p>";
        echo "<a href='" . $row["file_path"] . "'>Скачать диплом</a>";
        echo "</div>";
    }
} else {
    echo "Совпадений не найдено.";
}
$connect->close();
?>