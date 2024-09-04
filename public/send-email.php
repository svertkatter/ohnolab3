<?php
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
    $email = $_POST['email'] ?? '';
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
        $to = 'alice241102@gmail.com'; // 管理者のメールアドレス
        $headers = "From: " . $email . "\r\n";
        $message .= "\r\n\r\n名前: " . $name . "\r\n電話番号: " . $phone;

        // メール送信
        if (mail($to, $subject, $message, $headers)) {
            $response['status'] = 'success';
            $response['message'] = 'メールが送信されました。';
        } else {
            $response['message'] = 'メール送信に失敗しました。';
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
?>
