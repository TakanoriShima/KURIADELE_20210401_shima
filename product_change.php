<?php
    // ログインフィルター
    require_once 'admin_login_filter.php';
    // 外部ファイル読込
    require_once 'admin_dao.php';
    require_once 'item_dao.php';
    // セッション開始
    // session_start();
    // ログイン者の情報をセッションに保存
    $login_admin = $_SESSION['login_admin'];
    // 登録できないメッセージ表示
    $errors = $_SESSION['errors'];
    //破棄
    $_SESSION['errors'] = null;
    // var_dump($errors);
    // 無事に商品登録完了したメッセージ表示
    $flash_message = $_SESSION['register_message'];
    // 破棄
    $_SESSION['register_message'] = null;
    // idをGETで取得
    // $idをnullにする
    $id = null;
    // $idにGETでidを取得
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    // 登録した全ての商品情報表示する
    $items = ItemDAO::get_all_items();
    // var_dump($items);
?>


<!doctype html>
<html lang='ja'>
    <head>
        <meta charset='UTF-8'>
        <title>企業情報  商品情報変更</title>
        <link rel='stylesheet' href='index.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <div class='container-fluid sticky-top'>
            <div class='row  header '>
                <a href='admin_index.php' class='logo'><span class='col-lg-2 '>KURIADELE</span></a>
                <span class='col-lg offset-1 col-lg-1 px-0'></span>
                <span class='col-lg-4 px-0 span_a'>
                    <a href='admin_index.php' class='span_a'>管理者TOP</a>
                    <a href='index.php' class='span_a'>顧客TOP</a>
                    <a href='admin_logout.php' class='span_a'>ログアウト</a>
                </span>    
                
                <span class='col-lg-1 px-0 info'>
                    <form method='POST' action='search.php' class='info'>
                        <input type='search' name='name'/>
                        <input type='submit' value='検索'/>
                    </form>
                
            
                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown"></button>
                    <div class="dropdown-menu">
                        <a class='dropdown-item' href='#'><a href='company_philosophy.php'>KURIADELEについて</a>
                        <a class='dropdown-item' href='#'><a href='product.php'>取扱商品</a>
                        <a class='dropdown-item' href='#'><a href='contact.php'>サポート</a>
                    </div>
                </span>
            </div>
        </div>
        
        <div>
            <p class=customer>商品情報登録</p>
        </div>
        <?php if($errors !== null): ?>
            <?php foreach($errors as $error): ?>
                <p><?= $error ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <?= $flash_message?>
        <form method='POST' action='item_new.php' enctype="multipart/form-data">
            <div class='customer_information form-group row '>
                <label class='col-lg-4 col-form-label'>商品名</label>
                    <div class='col-lg-4 col-12'>
                        <input type='text' name='name' class='form-control'/>
                    </div>
            </div>
            <div class='customer_information form-group row'>
                 <label class='col-lg-4 col-form-label'>商品画像</label>
                    <div class='col-lg-4 col-12'>
                        <input type='file' name='image'>
                    </div>
            </div>
            <div class='customer_information form-group row'>
                <label class='col-lg-4 col-form-label'>金額</label>
                    <div class="col-lg-4 col-12">
                        <input type='text' name='price' class='form-control'/>
                    </div>
            </div>
            <div class='customer_information form-group row'>
                <label class='col-lg-4 col-form-label'>在庫数</label>
                    <div class='col-lg-4 col-12'>
                        <input type="text" name="stock" class='form-control'/>
                    </div>
            </div>
            
            <div class='customer_information form-group row'>
                 <label class='col-lg-4 col-form-label'>商品説明</label>
                    <div class='col-lg-4 col-12'>
                        <input type='text' name='description' class='form-control'/>
                    </div>
            </div>
        
            
            
            <div class='enroll_1'>
                <input type='submit' value='登録'/>
            </div>
            
        </form>
        <div class='customer'>登録内容確認</div>
        
        <!--商品情報変更画面から遷移  変更したものを表示する設定-->
        <?php foreach($items as $item): ?>
            <div class='product_1'>
                <a><?= $item->id ?></a>
                <img src='upload/items/<?= $item->image ?>' class='product_2'></img>
                <p class='product_3'><?= $item->name ?>￥<?= $item->price ?></p>
                
                <p class='product_3'><?= $item->description ?></p>
            </div>
        <?php endforeach; ?>
        <div class=corporation_1><a href='administrator.php'>管理者ページへ</a></div>
        
        
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
            <!--<ul><span>SNSアカウント</span>-->
            <!--</ul>-->
            
        </div>
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js' integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js' integrity='sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js' integrity='sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV' crossorigin='anonymous'></script>
    </body>
</thml>
