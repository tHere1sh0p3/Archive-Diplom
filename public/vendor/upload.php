<?php
session_start();
require_once 'db_connect.php';

$target_dir = "../uploads/diploms/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$fileType = pathinfo($target_file, PATHINFO_EXTENSION);

if (isset($_POST["submit"])) {
    // Проверка размера файла
    if ($_FILES["fileToUpload"]["size"] > 50000000) {
        $_SESSION['message'] = 'Размер файла слишком велик.';
            header('Location: ../load.php');
    } elseif ($fileType != "pdf") { // Допускаются только PDF файлы
        $_SESSION['message'] = 'Допустимы только PDF-файлы.';
        header('Location: ../load.php');
    } else {
        // Проверяем, существует ли уже запись с таким студентом и названием диплома
        $student_name = mysqli_real_escape_string($connect, $_POST['student_name']);
        $diploma_title = mysqli_real_escape_string($connect, $_POST['diploma_title']);
        
        $check_query = "SELECT * FROM diplomas WHERE student_name='$student_name' AND diploma_title='$diploma_title'";
        $result = $connect->query($check_query);
        
        if ($result->num_rows > 0) {
            $_SESSION['message'] = 'Такой диплом уже существует!';
            header('Location: ../load.php');
        } else {
            // Загрузка файла
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $file_path = $target_file;
                
                $sql = "INSERT INTO diplomas (student_name, diploma_title, file_path) VALUES ('$student_name', '$diploma_title', '$file_path')";
                if ($connect->query($sql) === TRUE) {
                    $_SESSION['message'] = 'Новый диплом добавлен успешно!';
                    header('Location: ../load.php');
                } else {
                    $_SESSION['message'] = "Ошибка: " . $sql . "<br>" . $connect->error;
                    header('Location: ../load.php');
                }
            } else {
                $_SESSION['message'] = 'Произошла ошибка при загрузке файла.';
                header('Location: ../load.php');
            }
        }
    }
}
?>