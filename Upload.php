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

    <form class="upload-form">
        <label for="title">عنوان الرواية:</label>
        <input type="text" id="title" required><br>

        <label for="author">اسم المؤلف:</label>
        <input type="text" id="author" required><br>

        <label for="content">محتوى الرواية:</label><br>
        <textarea id="content" rows="10" required></textarea><br>

        <button type="submit">رفع الرواية</button>
    </form>

    <footer>
        <a href="index.html">العودة إلى الصفحة الرئيسية</a>
    </footer>

    <script>
        // إضافة وظيفة حفظ الروايات باستخدام LocalStorage
        document.querySelector(".upload-form").addEventListener("submit", function(event) {
            event.preventDefault();

            const title = document.getElementById("title").value;
            const author = document.getElementById("author").value;
            const content = document.getElementById("content").value;

            let novels = JSON.parse(localStorage.getItem("novels")) || [];
            novels.push({ title, author, content });

            localStorage.setItem("novels", JSON.stringify(novels));

            alert("تم رفع الرواية بنجاح!");
        });
    </script>
</body>
</html>
