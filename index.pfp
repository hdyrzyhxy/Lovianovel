<?php
require_once 'config/database.php';  // استدعاء ملف الاتصال بقاعدة البيانات

$sql = "SELECT * FROM stories ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>موقع نشر الروايات</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <h1>موقع نشر الروايات</h1>
        <nav>
            <ul>
                <li><a href="index.php">الروايات</a></li>
                <li><a href="upload.php">رفع رواية جديدة</a></li>
            </ul>
        </nav>
    </header>

    <div class="novels-list">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='novel'>";
                echo "<h2>" . $row['title'] . "</h2>";
                echo "<p>بقلم: " . $row['author'] . "</p>";
                echo "<p>" . substr($row['content'], 0, 150) . "...</p>";
                echo "<a href='view.php?id=" . $row['id'] . "'>اقرأ المزيد</a>";
                echo "</div>";
            }
        } else {
            echo "<p>لا توجد روايات حالياً</p>";
        }
        $conn->close();
        ?>
    </div>

    <footer>
        <a href="upload.php">رفع رواية جديدة</a>
    </footer>
</body>
</html>
