<?php
    // 会員のお問い合わせ  自動で名前・メールアドレスが出力される
    // 外部ファイル読込
    require_once 'customer_dao.php';
    require_once 'contact_dao.php';
    // セッション開始
    session_start();
    // ログイン者の情報保存
    $login_customer = $_SESSION['login_customer'];
    // 入力情報の取得
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $contact = $_POST['contact'];
    $email_address = $_POST['email_address'];
    
    $contacts = new Contact($name, $subject, $contact, $email_address);
    // var_dump($my_contacts);
    // 入力エラーチェック
    $contact_error = ContactDAO::validate($contacts);
    
    
    // // 入力エラーがないならば
    if(count($contact_error) === 0){
        // 質問事項登録する
        ContactDAO::insert($contacts);
        // var_dump($contacts);
        // メッセージ表示
        $_SESSION['my_contact_message'] = 'ご質問ありがとうございます。ご返信にはお時間を頂きます。よろしくお願い致します。';
        // var_dump($my_contacts);
        header('Location: login_contact.php');
        exit;
    }else{ // 入力エラーがあるならば
    //         // エラーメッセージ表示
        $_SESSION['my_contact_error'] = $contact_error;
        // var_dump($my_contact_error);
        header('Location: login_contact.php');
        exit;
    }
?>