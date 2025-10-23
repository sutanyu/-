<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // 入力内容を取得
  $name    = htmlspecialchars($_POST["name"]);
  $song    = htmlspecialchars($_POST["song"]);
  $anime   = htmlspecialchars($_POST["anime"]);
  $artist  = htmlspecialchars($_POST["artist"]);
  $message = htmlspecialchars($_POST["message"]);

  // メール送信先
  $to = "sutanyu9@gmail.com";

  // メール件名
  $subject = "【すたにゅ】楽曲リクエストが届きました";

  // メール本文
  $body = <<<EOT
以下の内容でリクエストが送信されました：

お名前：$name
曲名：$song
アニメタイトル／ジャンル：$anime
アーティスト名：$artist
コメント：$message
EOT;

  // メールヘッダー
  $headers = "From: noreply@yourdomain.com\n";
  $headers .= "Content-Type: text/plain; charset=UTF-8";

  // メール送信
  if (mail($to, $subject, $body, $headers)) {
    echo "リクエストありがとうございました！";
  } else {
    echo "送信に失敗しました。お手数ですが再度お試しください。";
  }
} else {
  echo "フォームから送信してください。";
}
?>