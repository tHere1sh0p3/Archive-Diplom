<?php
session_start();
require_once 'vendor/db_connect.php';

$sql = "SELECT * FROM diplomas";
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
    echo "Дипломов не найдено.";
}
$connect->close();
?>