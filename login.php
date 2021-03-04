<?php
    session_start();
    // registration_new.phpのセッション　フラッシュメッセージ取得
    $flash_message = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;
    
    $login_error = $_SESSION['login_error'];
    var_dump($login_error);
?>

<!doctype html>
<thml lang='ja'>
    <head>
        <meta charset='UTF-8'>
        <title>ログイン</title>
        <link rel='stylesheet' href='index.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <div class='col-lg-12'>
            <div class='header row'>
        
                <a href='index.php' class='logo'><span class='com'>KURIADELE</span></a>
                
                <span class='info_1'><a href='items.php'>商品情報</a></span>
                <span class='info_2'><a href='contact.php'>お問い合わせ</a></span>
                <span class='info_3'><a href='login.php'>ログイン</a></span>
                
                
                
                <span class='info'>
                    <form method='POST' action='送信先'>
                        <input type='text' name=''/><input type='submit' name='' value='検索'/>
                    </form>
                </span>
            
                <button type='button' class='btn btn-light dropdown-toggle' data-toggle='dropdown'>
                </button>
                <!--<div class='dropdown-menu'>-->
                <!--    <a class='dropdown-item' href='#'><a href='corporate_philosophy.php'>KURIADELEについて</a>-->
                <!--    <a class='dropdown-item' href='#'><a href='product.php'>取扱商品</a>-->
                <!--    <a class='dropdown-item' href='#'><a href='contact.php'>サポート</a>-->
                <!--</div>-->
            </div>
        </div>
        <br><br>
    
        <div class='customer'>
            <a href='sign_up.php'>
            新規会員登録の方はこちら
            </a>
        </div>
        <br>
        <br>
        <!--新規登録成功のメッセージ表示-->
        
        <?php if($flash_message !== null): ?>
            <p><?= $flash_message ?></p>
        <?php endif; ?>
        
        
        <div class='login_1'>ＭＹページログイン</div>
        <?php foreach($login_error as $errors): ?>
            <p><?= $login_error ?></p>
        <?php endforeach; ?>
        <form action='login_check.php' method='POST'>
            <div class='login_2'>
                メールアドレス  <input type='text' name='email_address' /><br><br>
                パスワード  <input type='password' name='password'/><br>
            
            
                <p class='enroll_1'><input type='submit' value='login'/></p>
            </div>
        </form>             
        <br>
                                    
        
        
    
    
    
    
    
        <div class='footer '>
            <ul><span><a href='corporate_philosophy.php'>KURIADELEについて</a></span><br>
                <li>代表挨拶</li>
                <li>事業計画</li>
                <li>展望</li>
            </ul>
            <ul><span><a href='product.php'>取扱商品</a></span>
                <li>商品一覧</li>
            </ul>
            <ul><span><a href='contact.php'>サポート</a></span>
                <li>お問い合わせ</li>
            </ul>
            <ul><span>SNSアカウント</span>
            </ul>
            
        </div>
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js' integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js' integrity='sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js' integrity='sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV' crossorigin='anonymous'></script>
    </body>
</thml>
