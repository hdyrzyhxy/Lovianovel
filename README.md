# Lovianovel

<?php
// إعداد الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root"; // المستخدم الافتراضي في XAMPP
$password = ""; // لا كلمة مرور في XAMPP
$dbname = "novels";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// إضافة الرواية الجديدة
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

// استرجاع الروايات من قاعدة البيانات
$sql = "SELECT * FROM stories ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>موقع نشر الروايات</title>
    <style>
        /* إعدادات الخلفية */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #fff;
            background-image: url('https://www.transparenttextures.com/patterns/flower-dots.png'); /* صورة زهور بسيطة */
            background-repeat: repeat;
            margin: 0;
            padding: 0;
            color: #4b3c31; /* لون دافئ للقهوة */
        }

        header {
            background-color: #6d4c41; /* لون دافئ مثل القهوة */
            color: white;
            padding: 30px;
            text-align: center;
            border-bottom: 5px solid #c49a6c;
        }

        header nav ul {
            list-style: none;
            padding: 0;
        }

        header nav ul li {
            display: inline;
            margin: 0 15px;
        }

        header nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        /* تنسيق قائمة الروايات */
        .novels-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 20px;
        }

        .novel {
            background-color: #ffffff;
            border: 1px solid #d1a27e;
            padding: 20px;
            margin: 15px;
            width: 250px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .novel:hover {
            transform: scale(1.05);
        }

        .novel h2 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #3e2723;
        }

        .novel p {
            font-size: 14px;
            color: #4b3c31;
        }

        .novel a {
            color: #6d4c41;
            text-decoration: none;
            font-weight: bold;
        }

        .novel a:hover {
            text-decoration: underline;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #6d4c41;
            color: white;
            border-top: 5px solid #c49a6c;
        }

        footer a {
            color: #f0e1c6;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        /* تنسيق الرسائل */
        .success-message {
            color: green;
            text-align: center;
            font-size: 18px;
        }

        .error-message {
            color: red;
            text-align: center;
            font-size: 18px;
        }

        /* تنسيق نموذج رفع الرواية */
        .upload-form {
            margin: 20px auto;
            width: 80%;
            max-width: 500px;
            background-color: #fff3e0;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .upload-form input, .upload-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #c49a6c;
        }

        .upload-form button {
            width: 100%;
            padding: 15px;
            background-color: #6d4c41;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .upload-form button:hover {
            background-color: #4b3c31;
        }
    </style>
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
