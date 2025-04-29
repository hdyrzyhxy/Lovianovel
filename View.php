<?php
require_once 'config/database.php';  // استدعاء الاتصال بقاعدة البيانات

$id = $_GET['id'];
$sql = "SELECT * FROM stories WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['title']; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <h1><?php echo $row['title']; ?></h1>
    </header>

    <div class="novel-content">
        <h3>بقلم: <?php echo $row['author']; ?></h3>
        <p><?php echo nl2br($row['content']); ?></p>
    </div>

    <footer>
        <a href="index.php">العودة إلى الصفحة الرئيسية</a>
    </footer>
</body>
</html>

<?php
$conn->close();
?>
