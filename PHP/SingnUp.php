<?php

// セッション開始
session_start();

$db['host'] = "localhost";  // DBサーバのURL
$db['username'] = "hew2022_10712";  // ユーザー名
$db['password'] = "";  // ユーザー名のパスワード
$db['dbname'] = "hew2022_10712";  // データベース名

// エラーメッセージ、登録完了メッセージの初期化
$errorMessage = "";
$signUpMessage = "";

// ログインボタンが押された場合
if(isset($_POST["signUp"])){

    // 1. ユーザIDの入力チェック
    if(empty($_POST["username"])){ // 値が空のとき
        $errorMessage = 'ユーザーIDが未入力です。';
    }elseif(empty($_POST["password"])){
        $errorMessage = 'パスワードが未入力です。';
    }elseif(empty($_POST["password2"])){
        $errorMessage = 'パスワードが未入力です。';
    }
    
    // 2. ユーザIDとパスワードが入力されていたら認証する
    if(!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["password2"]) && $_POST["password"] === $_POST["password2"]) {
        // 入力したユーザIDとパスワードを格納
        $username = $_POST["username"];
        $password = $_POST["password"];

        $dsn = sprintf('mysql:host=localhost;port=3306;dbname=hew2022_10712;charset=utf8');
        
        // 3. 接続エラー処理
        try {
            // 4. 入力されたユーザー名が既にDB内にあるかの確認を行う(存在していた場合は処理を抜ける)
            $pdo = new PDO($dsn, $db['username'], $db['password'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $Login_User = $pdo->query('SELECT * FROM login_user ORDER BY num DESC');
            
            while($name = $Login_User->fetch()) {
                //ユーザー名検索
                if($name['username'] == $username) {
                    $errorMessage = '既にこの名前は登録されています。';
                    goto error;
                }
            }

            // 5. ユーザー名とパスワードの格納処理
            $pdo = new PDO($dsn, $db['username'], $db['password'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $stmt = $pdo->prepare("INSERT INTO login_user(username,password) VALUES (?, ?)");
            
            // ユーザー名をハッシュ化したパスワードをDBに格納
            $stmt->execute(array($username, password_hash($password, PASSWORD_DEFAULT))); 

            // 登録した(DB側でauto_incrementした)IDを$useridに入れる
            $userid = $pdo->lastinsertid(); 
            
            // 登録完了通知 
            $signUpMessage = '登録が完了しました。あなたの登録IDは '. $userid. ' です。パスワードは '. $password. ' です。';  // ログイン時に使用するIDとパスワード
          
        } catch (PDOException $e) {
            $errorMessage = 'データベースエラー';
            exit();
        }
    } elseif($_POST["password"] != $_POST["password2"]) {
        $errorMessage = 'パスワードに誤りがあります。';
    }
    
}
error:

?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="robots" content="none,noindex,nofollow">
        <title>新規登録</title>
        <link rel="stylesheet" href="../css/chat.css?v=2"type='text/css'>
        <link rel="shortcut icon" href="../image/favicon_wood_life.ico" type="image/vnd.microsoft.icon">
    <link rel="icon" href="../image/favicon_wood_life.ico" type="image/vnd.microsoft.icon">
    </head>
    <body class="singnUP_body">
        <h1>SINGN UP</h1>
        <div class="Singn_form">
            <form id="loginForm" name="loginForm" action="" method="POST">
                    <div class="user_info">
                        <p for="username" class="Login_ID">ユーザー名</p>
                        <div class="error"><font color="#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></font></div>
                        <div class="error"><font color="#0000ff"><?php echo htmlspecialchars($signUpMessage, ENT_QUOTES); ?></font></div>
                    </div>
                    <input  type="text" class="User"  id="username" name="username" placeholder="ユーザー名を入力" value="<?php if (!empty($_POST["username"])) {echo htmlspecialchars($_POST["username"], ENT_QUOTES);} ?>">
                    
                    <p for="password" class="Login_PW">パスワード</p>
                    <input type="password" class="User"  id="password" name="password" value="" placeholder="パスワードを入力">
                    
                    <p for="password2" class="Login_PW">パスワード(確認用)</p>
                    <input type="password" id="password2" class="User"  name="password2" value="" placeholder="再度パスワードを入力">

                    <input type="submit" id="signUp" name="signUp" value="サインアップ" class="Login_submit">

            </form>
            <a href="./Login.php" class="SingnUp_to_login">ログイン画面へ戻る</a>
        </div>
    </body>
</html>