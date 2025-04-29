<?php
require_once 'config/database.php';  // استدعاء الاتصال بقاعدة البيانات

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $content = $_POST['content'];

    $sql = "INSERT INTO stories (title, author, content) VALUES ('$title', '$author', '$content')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='success-message'>تم إضافة الرواية بنجاح!</div>";
    } else {
        echo "<div class='error-message'>خطأ: " . $conn->error . "</div>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>رفع رواية جديدة</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <h1>رفع رواية جديدة</h1>
    </header>

    <form method="POST" action="upload.php" class="upload-form">
        <label for="title">عنوان الرواية:</label>
        <input type="text" name="title" required><br>

        <label for="author">اسم المؤلف:</label>
        <input type="text" name="author" required><br>

        <label for="content">محتوى الرواية:</label><br>
        <textarea name="content" rows="10" required></textarea><br>

        <button type="submit">رفع الرواية</button>
    </form>

    <footer>
        <a href="index.php">العودة إلى الصفحة الرئيسية</a>
    </footer>
</body>
</html>
