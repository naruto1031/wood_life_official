<?php
// セッション開始
session_start();

$db['host'] = "localhost";  // DBサーバのURL
$db['username'] = "hew2022_10712";  // ユーザー名
$db['password'] = "";  // ユーザー名のパスワード
$db['dbname'] = "hew2022_10712";  // データベース名
const Admini = "管理者"; //管理者ユーザー名

// エラーメッセージの初期化
$errorMessage = "";

// ログインボタンが押された場合
if (isset($_POST["login"])) {
    // 1. ユーザIDの入力チェック
    if (empty($_POST["userid"])) {  // emptyは値が空のとき
        $errorMessage = 'ユーザーIDが未入力です。';
    } else if (empty($_POST["password"])) {
        $errorMessage = 'パスワードが未入力です。';
    }

    if (!empty($_POST["userid"]) && !empty($_POST["password"])) {
        // 入力したユーザIDとPWを格納
        $userid = $_POST["userid"];
        $password = $_POST["password"];
        // ユーザIDとパスワードが入力されていたら認証する
        $dsn = 'mysql:host=localhost;port=3306;dbname=hew2022_10712;charset=utf8';

        // エラー処理
        try {
            // Mysqlへの接続への接続を確立
            $pdo = new PDO($dsn, $db['username'], $db['password'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

            // 特定要素を変数に代入
            $stmt = $pdo->query('SELECT * FROM login_user ORDER BY num DESC');

            // 全行を参照するまで一行ずつ読み込み、繰り返す
            while($row = $stmt->fetch()){
                
                // 入力値がデータベースに登録したユーザー名と同じ且つ、それが管理者のユーザー名の場合
                if($userid == $row['username'] && $userid == Admini ){
                    
                    // パスワード判定
                    if(password_verify($password, $row['password'])){

                        // クッキーにユーザー名を格納
                        setcookie("servar_info",$row['username'],time()+60*60*24);
                        $_SESSION["Admini_chat_cnt"] = 0;

                        //administrator.php(管理者画面)にアクセス
                        header("Location:Administrator.php?NAME=".$row['username']);  // メイン画面へ遷移
                        exit;
                    }
                
                // 登録したユーザー名と同じ場合
                }elseif($userid == $row['username']) {

                    // パスワード判定
                    if (password_verify($password, $row['password'])) {

                        setcookie("name_info",$row['username'],time()+60*60*24);

                        //chat.php(ユーザー画面)にアクセス
                        header("Location:chat.php?NAME=".$row['username']);  // メイン画面へ遷移
                        exit;
                
                    }       
               
                }
            
            }

            $errorMessage = 'ユーザーIDあるいはパスワードに誤りがあります';

        } catch (PDOException $e) {
            $errorMessage = 'データベースエラー';
        }



    }
}

?>

<!doctype html>
<html>
    <head>
        <meta name="robots" content="none.noindex">
        <meta charset="UTF-8">
        <title>ログイン</title>
        <link rel="stylesheet" href="../css/chat.css?v=2"type='text/css'>
        <link rel="shortcut icon" href="../image/favicon_wood_life.ico" type="image/vnd.microsoft.icon">
        <link rel="icon" href="../image/favicon_wood_life.ico" type="image/vnd.microsoft.icon">
        <meta name="robots" content="none,noindex,nofollow">
    </head>
    <body class="Login_body">
            <h1>LOGIN</h1> 
            <div class="Login_form">
                <form id="loginForm" name="loginForm" action="" method="POST">
                        <div class="user_info">
                            <p class="Login_ID">ユーザーID</p>    
                            <div class="error"><font color="#ff0000"><?php print htmlspecialchars($errorMessage, ENT_QUOTES); ?></font></div>
                        </div>
                        <label for="userid"></label><input class="User" type="text" id="userid" name="userid" placeholder="ユーザーIDを入力" value="<?php if (!empty($_POST["userid"])) {echo htmlspecialchars($_POST["userid"], ENT_QUOTES);} ?>">
                        
                        <p class="Login_PW">パスワード</p>
                        <label for="password"></label><input class="User" type="password" id="password" name="password" value="" placeholder="パスワードを入力"> 
                        <input type="hidden" name="ticket" value="<?php print $ticket?>">
                        <br>
                        <input type="submit" class="Login_submit" id="login" name="login" value="ログイン">
                </form>
                <div class="action">
                    <a href="./SingnUp.php" class="SingnUp">会員登録はこちらから</a>
                    <a href="../index.php" class="Top">トップへ戻る</a>
                </div>
            </div>
    </body>
</html>