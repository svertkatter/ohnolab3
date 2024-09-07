<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Composer でインストールした場合
require 'vendor/autoload.php';

// CORSの許可
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json; charset=UTF-8'); // JSON形式で返すためのヘッダー

// エラーレポートの表示
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$response = [
    'status' => 'error',
    'message' => '不明なエラーが発生しました。'
];

// POSTリクエストか確認
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 入力値を取得し、基本的なサニタイズを行う
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? ''; // フォームに入力されたユーザーのメールアドレス
    $phone = $_POST['phone'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';

    // エラーメッセージの初期化
    $err_msg = '';

    // 空チェック
    if (!$name || !$email || !$phone || !$subject || !$message) {
        $err_msg = '全ての項目を入力してください。';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err_msg = '有効なメールアドレスを入力してください。';
    }

    // エラーがない場合にメール送信
    if ($err_msg === '') {
        $toAdmin = getenv('NUXT_PUBLIC_EMAIL_USER'); // 管理者のメールアドレス（受信者）

        $mail = new PHPMailer(true);

        try {
            // 環境変数からアプリパスワードを取得
            $emailPass = getenv('NUXT_PUBLIC_EMAIL_PASS'); // アプリパスワード

            if (!$toAdmin || !$emailPass) {
                throw new Exception('管理者のメールアドレスまたはパスワードが環境変数に設定されていません。');
            }

            // SMTP 設定
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // GmailのSMTPサーバーを使用
            $mail->SMTPAuth = true;
            $mail->Username = $toAdmin; // 管理者のメールアドレスをSMTPユーザー名として使用
            $mail->Password = $emailPass; // 環境変数から取得したアプリパスワード
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // 送信者設定 (管理者のメールアドレスを送信者に設定)
            $mail->setFrom($toAdmin, mb_encode_mimeheader('管理者', 'UTF-8')); // 管理者のメールアドレスを送信者として設定

            // 受信者設定 (管理者のメールアドレス)
            $mail->addAddress($toAdmin); // 管理者のメールアドレス

            // フォーム入力されたユーザーのメールアドレスを返信用として設定（名前なし）
            $mail->addReplyTo($email); // ユーザーのメールアドレスをReply-Toに設定（名前なし）

            // メールの内容設定（本文にユーザーのメールアドレスを追加）
            $mail->isHTML(true);
            $mail->Subject = mb_encode_mimeheader($subject, 'UTF-8'); // 件名をUTF-8でエンコード
            $mail->Body    = nl2br(htmlspecialchars($message)) . 
                            "<br><br>名前: " . htmlspecialchars($name) . 
                            "<br>電話番号: " . htmlspecialchars($phone) . 
                            "<br>メールアドレス: " . htmlspecialchars($email); // メールアドレスを追加

            // メール送信
            $mail->send();
            $response['status'] = 'success';
            $response['message'] = 'メールが送信されました。';
        } catch (Exception $e) {
            $response['message'] = "メール送信に失敗しました。エラー: {$mail->ErrorInfo}";
        }
    } else {
        // エラーがある場合はエラーメッセージを返す
        $response['message'] = $err_msg;
    }

    // 結果をJSON形式で返す
    echo json_encode($response);
    exit();
} else {
    // GETリクエストの場合はエラーメッセージを返す
    $response['message'] = '無効なリクエスト方法です。';
    echo json_encode($response);
    exit();
}





// // CORSの許可
// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: POST');
// header('Access-Control-Allow-Headers: Content-Type');
// header('Content-Type: application/json; charset=UTF-8'); // JSON形式で返すためのヘッダー

// // エラーレポートの表示
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// $response = [
//     'status' => 'error',
//     'message' => '不明なエラーが発生しました。'
// ];

// // POSTリクエストか確認
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // 入力値を取得し、基本的なサニタイズを行う
//     $name = $_POST['name'] ?? '';
//     $email = $_POST['email'] ?? '';
//     $phone = $_POST['phone'] ?? '';
//     $subject = $_POST['subject'] ?? '';
//     $message = $_POST['message'] ?? '';

//     // エラーメッセージの初期化
//     $err_msg = '';

//     // 空チェック
//     if (!$name || !$email || !$phone || !$subject || !$message) {
//         $err_msg = '全ての項目を入力してください。';
//     } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//         $err_msg = '有効なメールアドレスを入力してください。';
//     }

//     // エラーがない場合にメール送信
//     if ($err_msg === '') {
//         $toAdmin = 'm2471007@st.t-kougei.ac.jp'; // 管理者のメールアドレス
//         $fromName = mb_encode_mimeheader($name, 'UTF-8'); // 差出人の名前をMIMEエンコード
//         $encodedMessage = base64_encode($message . "\r\n\r\n名前: " . $name . "\r\n電話番号: " . $phone); // メッセージのエンコード

//         // ヘッダーを設定
//         $headers = "Content-Type: text/plain; charset=UTF-8\r\n";
//         $headers .= "From: " . $fromName . "<" . $email . ">\r\n";
//         $headers .= "Sender: " . $toAdmin . "\r\n";
//         $headers .= "Return-Path: " . $toAdmin . "\r\n";
//         $headers .= "Reply-To: " . $email . "\r\n";
//         $headers .= "Content-Transfer-Encoding: BASE64\r\n";

//         // メール送信
//         if (mb_send_mail($toAdmin, $subject, $encodedMessage, $headers, '-f ' . $toAdmin)) {
//             $response['status'] = 'success';
//             $response['message'] = 'メールが送信されました。';
//         } else {
//             $response['message'] = 'メール送信に失敗しました。';
//         }
//     } else {
//         // エラーがある場合はエラーメッセージを返す
//         $response['message'] = $err_msg;
//     }

//     // 結果をJSON形式で返す
//     echo json_encode($response);
//     exit();
// } else {
//     // GETリクエストの場合はエラーメッセージを返す
//     $response['message'] = '無効なリクエスト方法です。';
//     echo json_encode($response);
//     exit();
// }
?>