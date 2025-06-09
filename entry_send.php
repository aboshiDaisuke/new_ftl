<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST["name"] ?? "");
    $school = htmlspecialchars($_POST["school"] ?? "");
    $faculty = htmlspecialchars($_POST["faculty"] ?? "");
    $department = htmlspecialchars($_POST["department"] ?? "");
    echo "送信ありがとうございます。<br>";
    echo "氏名: $name<br>";
    echo "学校: $school<br>";
    echo "学部: $faculty<br>";
    echo "学科: $department<br>";
} else {
    echo "不正なアクセスです。";
}
?>
