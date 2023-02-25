
    
<?php
    // セッション開始
    session_start(); 
    define("admini", "管理者"); //管理者名を定数で格納 
    
        
    // 以下データベースに格納する処理
    if(isset($_POST['message'])){
        //formから受け取った名前・文章を変数に格納
        $my_nam=htmlspecialchars(admini);
        $my_mes=htmlspecialchars($_POST["message"], ENT_QUOTES);
        $receiver = $_COOKIE['receiver_user'];
        
        //データベース情報を変数に格納   
        $dsn= "mysql:host=localhost;port=3306;dbname=hew2022_10712;charset=utf8";   
        
        // 接続時エラー処理
        try{
            // POD既定のインスタンスを作成し、Mysqlへの接続を確立
            $db = new PDO($dsn,"hew2022_10712","", array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

            // データベースのテーブル内を操作(名前、メッセージ内容,現在時刻を格納)
            $db->query("INSERT INTO chat_tb (num,name,receiver,message,date)
                VALUES (NULL,'$my_nam','$receiver','$my_mes',NOW())"
            );
            
        }catch (PDOException $e) {
            // 接続エラーなど問題が発生したの場合以下を実行
            echo $e->getMessage() . PHP_EOL;
        }

        // chat.php(現在地)にリダイレクトする
        $_SESSION["Admini_chat_cnt"]++;
        header("Location: {$_SERVER['PHP_SELF']}");
        exit;
    }
        


    // データベース情報を変数に格納
    $dsn= "mysql:host=localhost;port=3306;dbname=hew2022_10712;charset=utf8"; 

    // POD既定のインスタンスを作成し、Mysqlへの接続を確立
    $db = new PDO($dsn,"hew2022_10712","");
    
    // チャット情報をNUMの降順で変数に格納
    $ps = $db->query("SELECT * FROM chat_tb ORDER BY num DESC");


    
    //時間に関する定数の定義======================================
    define("ONEMINUITE", 60);					//1分（秒）
    define("ONEHOUR",    60 * 60);				//1時間（秒）
    define("ONEDAY",     60 * 60 * 24);			//1日（秒）
    define("ONEWEEK",    60 * 60 * 24 * 7);		//1週間（秒）
    define("ONEMONTH",   60 * 60 * 24 * 30);	//1月（秒）
    define("ONEYEAR",    60 * 60 * 24 * 365);	//1年（秒）
    //===========================================================


    // 経過時間を演算する関数の定義部===============================
    function elapsedTime($dest,$current) {      

        // 現在時刻と投稿時刻のタイムスタンプとの差分を変数$ttに格納
        $tt =   $current - $dest;
        
        // 定数を用いて経過時間を表示する(例:経過時間が1年を超えている場合$ttと一年の商を小数部切捨てで変数に格納)
        if ($tt / ONEYEAR  > 1) return abs(round($tt / ONEYEAR))    . '年前';
        if ($tt / ONEMONTH > 1) return abs(round($tt / ONEMONTH))   . 'ヶ月前';
        if ($tt / ONEWEEK  > 1) return abs(round($tt / ONEWEEK))    . '週間前';
        if ($tt / ONEDAY   > 1) return abs(round($tt / ONEDAY))     . '日前';
        if ($tt / ONEHOUR  > 1) return abs(round($tt / ONEHOUR))    . '時間前';
        if ($tt / ONEMINUITE > 1) return abs(round($tt / ONEMINUITE)) . '分前';
        if ($tt > 0)            return abs(round($tt)) . '秒前';
        // 現在時刻=投稿時刻(送信時)
        return '現在';
    }
    //==========================================================         


    //送信者一覧を表示する関数====================================
    function options(){
        $dsn= "mysql:host=localhost;port=3306;dbname=hew2022_10712;charset=utf8";
        try{
           // POD既定のインスタンスを作成し、Mysqlへの接続を確立
           $db = new PDO($dsn,"hew2022_10712","");
           $nm = $db->query("SELECT * FROM login_user ORDER BY num");

        }catch (PDOException $e) {
           // 接続エラーなど問題が発生したの場合以下を実行
           echo $e->getMessage() . PHP_EOL;
        }    

        // 送信者表示処理
        while($n = $nm->fetch()){

            if($n['username'] === admini){
                continue;
            }
            $option = <<<EOD

                <option>{$n['username']}</option>

            EOD;

            print $option;
            
        }
    }
    //==========================================================


    //テキストボックス及び送信ボタンを表示する関数==================
    function message_form(){  
            $html = <<<EOD
        
                <form action="" method="post">

                    <div class="Admini_post">
                        <input type="file" name="upload_contents">
                        <input type="submit" value="送信" id="submit" class="submit01">
                        <p>or ctrl+Enter</p>
                    </div>
                    <div><textarea name="message" class="textarea"             
                    onkeydown="if(event.ctrlKey&&event.keyCode==13){
                        document.getElementById('submit').click();return false
                    };"></textarea></div>
                    <input type="hidden" name="messege_contents">
                    

                </form>
            
            EOD;
        print $html;
    }
    //==========================================================


    //メッセージを表示する関数====================================
    function message_contents(){
        // データベース情報を変数に格納
        $dsn= "mysql:host=localhost;port=3306;dbname=hew2022_10712;charset=utf8"; 

        // POD既定のインスタンスを作成し、Mysqlへの接続を確立
        $db = new PDO($dsn,"hew2022_10712","");
    
        // チャット情報をNUMの降順で変数に格納
        $cn = $db->query("SELECT * FROM chat_tb ORDER BY num DESC");
        
        while($r = $cn->fetch()){       
            $beforedest = $r['date']; // 投稿日時の格納
            $dest = strtotime($beforedest); // 投稿日時をタイムスタンプに変換する
            $current = time(); // 現在の時刻(タイムスタンプ)
            $outstr = elapsedTime($dest,$current); // elapsedTime関数の実行

            if(admini == $r["name"] && $r["receiver"] == $_SESSION['receiver_user'] ){
            
            ?>
                <div class="chat_list"  id="ajax">
                    <!-- 名前部 -->
                    <div class="chat_name">
                        <?php   
                            print ("{$r['name']}");
                        ?>
                    </div>

                    <!-- チャット時刻(経過時間) -->
                    <div class="chat_date">
                        <?php
                            print ($outstr);
                        ?>
                    </div>

                    <!-- チャット内容 -->
                    <div class="chat_message">
                        <?php
                            $len = 0;
                            $n=60; // 改行させる（半角での）文字数
                            $message_contents = $r['message'];
                                // 文字数に応じた改行処理
                                for($i=0;$i<mb_strlen($message_contents);$i+=$len){
                                    for($j=1;$j<=$n;$j++){
                                        $wk=mb_substr($message_contents,$i,$j);
                                        if(strpos($wk, "\n") !== FALSE){
                                            break;
                                        }
                                        if(strlen($wk)>=$n){
                                            break;
                                        } 
                                    }
                                    $len=mb_strlen($wk);
                                    print $wk."<br>";
                                }
                        ?> 
                    </div> 

                </div>
                
            <?php 
            }elseif($r["name"] == $_SESSION['receiver_user'] && $r["receiver"] ==  admini){
            ?>
                
                <div class="servar_chat_list"  id="ajax">
                    <!-- 名前部 -->
                    <div class="servar_name">
                        <?php   
                            print ("{$r['name']}");
                        ?>
                    </div>
                    <!-- チャット時刻(経過時間) -->
                    <div class="servar_chat_date">
                        <?php
                            print ($outstr);
                        ?>
                    </div>
                    <!-- チャット内容 -->
                    <div class="servar_chat_message">
                        <?php
                            $len = 0;
                            $n=70; // 改行させる（半角での）文字数
                            $message_contents = $r['message'];
                            // 文字数に応じた改行処理
                            for($i=0;$i<mb_strlen($message_contents);$i+=$len){
                                for($j=1;$j<=$n;$j++){      
                                    $wk=mb_substr($message_contents,$i,$j);    
                                    if(strpos($wk, "\n") !== FALSE){
                                        break;
                                    }    
                                    if(strlen($wk)>=$n){
                                        break;
                                    } 
                                }
                                $len=mb_strlen($wk);
                                print $wk."<br>";
                            }
                        ?> 
                    </div> 

                </div>
            <?php
        
            }
        }
        
    }
    //==========================================================

?>
    
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <title>管理者</title>
	<meta name="Author" content=""/>
    <meta name="robots" content="none,noindex,nofollow">
	<link rel="stylesheet" type="text/css" href="../css/chat.css?=2">
    <link rel="shortcut icon" href="../image/favicon_wood_life.ico" type="image/vnd.microsoft.icon">
    <link rel="icon" href="../image/favicon_wood_life.ico" type="image/vnd.microsoft.icon">
</head>
<body class="Admini_body">

    <h1>管理者画面</h1>



        <a href="./Login.php">ログアウト</a>

        <form action="" method="post">
        <select name="receiver_user" class="sender_user">
        

            <option>送信先を選択してください</option>
            <?php
                options();//送信者一覧の呼び出し
            ?>

        </select>
        
        <input type="submit" value="選択">
        
        </form> 
        <div class="textbox_Adimini">
            <?php 
                if(isset($_POST['receiver_user'])){ // 送信者選択が行われた場合
                    $send_user = $_POST['receiver_user'];
                    message_form();
                    $_SESSION['receiver_user'] = $send_user;
                    setcookie('receiver_user',$send_user);
                    message_contents();
                }elseif($_SESSION["Admini_chat_cnt"] > 0){ // 一度ユーザーに対して送信を行った場合にFormとメッセージを継続表示させる
                    message_form();
                    message_contents();
                }

            ?>
        </div>
    <script type="text/javascript" src="../js/chat.js"></script>
</body>
</html>