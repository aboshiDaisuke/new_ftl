<?php
mb_language("Japanese");
mb_internal_encoding("UTF-8");

$categories = isset($_POST["category"]) ? implode(", ", $_POST["category"]) : "選択なし";
$name = htmlspecialchars($_POST["name"], ENT_QUOTES);
$phone = htmlspecialchars($_POST["phone"], ENT_QUOTES);
$email = htmlspecialchars($_POST["email"], ENT_QUOTES);
$message = htmlspecialchars($_POST["message"], ENT_QUOTES);

$to = "your@email.com"; // ← 宛先を変更してください
$subject = "【お問合せ】" . $categories;
$body = "お問い合わせ種別: $categories\nお名前: $name\n電話番号: $phone\nメール: $email\n\n内容:\n$message";
$headers = "From: $email";

if (mb_send_mail($to, $subject, $body, $headers)) {
    echo "お問い合わせを受け付けました。ありがとうございました。";
} else {
    echo "送信に失敗しました。";
}
?>
