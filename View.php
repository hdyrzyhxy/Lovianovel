// تحميل الروايات من localStorage وعرضها على الصفحة
document.addEventListener("DOMContentLoaded", function() {
    const novelsList = document.querySelector(".novels-list");

    let novels = JSON.parse(localStorage.getItem("novels")) || [];

    if (novels.length === 0) {
        novelsList.innerHTML = "<p>لا توجد روايات حالياً.</p>";
    } else {
        novels.forEach(novel => {
            const novelElement = document.createElement("div");
            novelElement.classList.add("novel");

            novelElement.innerHTML = `
                <h2>${novel.title}</h2>
                <p>بقلم: ${novel.author}</p>
                <p>${novel.content.substring(0, 150)}...</p>
                <a href="#">اقرأ المزيد</a>
            `;

            novelsList.appendChild(novelElement);
        });
    }
});
