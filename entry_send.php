<?php
// 文字コードの設定（日本語対応）
mb_language("Japanese");
mb_internal_encoding("UTF-8");

// 入力値を取得・サニタイズ
$name = htmlspecialchars($_POST['name'] ?? '');
$furigana = htmlspecialchars($_POST['furigana'] ?? '');
$school = htmlspecialchars($_POST['school'] ?? '');
$grade = htmlspecialchars($_POST['grade'] ?? '');
$phone = htmlspecialchars($_POST['phone'] ?? '');
$email = htmlspecialchars($_POST['email'] ?? '');
$email_confirm = htmlspecialchars($_POST['email_confirm'] ?? '');
$desired_positions = $_POST['desired_position'] ?? [];
$motivation = htmlspecialchars($_POST['motivation'] ?? '');
$self_pr = htmlspecialchars($_POST['self_pr'] ?? '');
$remarks = htmlspecialchars($_POST['remarks'] ?? '');

// メール本文の作成
$body = "学生エントリーが届きました。\n\n"
      . "【氏名】\n$name\n\n"
      . "【ふりがな】\n$furigana\n\n"
      . "【学校名】\n$school\n\n"
      . "【学年】\n$grade\n\n"
      . "【電話番号】\n$phone\n\n"
      . "【メールアドレス】\n$email\n\n"
      . "【希望の職種】\n" . implode(", ", $desired_positions) . "\n\n"
      . "【志望動機】\n$motivation\n\n"
      . "【自己PR】\n$self_pr\n\n"
      . "【備考】\n$remarks\n";

// 送信先の設定
$to = "your-email@example.com"; // ←ここをあなたのメールアドレスに変更してください
$subject = "学生エントリーシートの送信";
$headers = "From: " . $email;

// メール送信
$success = mb_send_mail($to, $subject, $body, $headers);

// 簡易レスポンス
if ($success) {
    echo "送信が完了しました。ありがとうございました。";
} else {
    echo "送信に失敗しました。";
}
?>
