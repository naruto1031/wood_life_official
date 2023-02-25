
    
<?php
    session_start();
    $set = $_COOKIE['name_info'];
           
    // 以下データベースに格納する処理
    if(isset($_POST['message'])) {

        //formから受け取った名前・文章を変数に格納
        $my_nam=htmlspecialchars($set);
        $my_mes=htmlspecialchars($_POST["message"], ENT_QUOTES);
        $receiver = "管理者";
        
        //データベース情報を変数に格納   
        $dsn= "mysql:host=localhost;port=3306;dbname=hew2022_10712;charset=utf8";   
        
        // try・catch文を用いて接続時エラーを弾く
        try{
            //POD既定のインスタンスを作成し、Mysqlへの接続を確立 / PDOオプションを利用してエラー処理を行う。
            $db = new PDO($dsn,"hew2022_10712","",[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,]);

            //データベースのテーブル内を操作(名前、メッセージ内容,現在時刻を格納)
            $db->query("INSERT INTO chat_tb (num,name,receiver,message,date)

                    VALUES (NULL,'$my_nam','$receiver','$my_mes',NOW())"
            
            );

        }catch (PDOException $e) {
            // 接続エラーなど問題が発生したの場合以下を実行
            echo $e->getMessage() . PHP_EOL;
        }
       
        //chat.php(現在地)にリダイレクトする
        header("Location: {$_SERVER['PHP_SELF']}");
        exit;

    }
?>





    <?php

    //データベース情報を変数に格納
    $dsn= "mysql:host=localhost;port=3306;dbname=hew2022_10712;charset=utf8"; 

    //PDO既定のインスタンスを作成し、Mysqlへの接続を確立
    $db = new PDO($dsn,"hew2022_10712","");
    
    //チャット情報をNUMの降順で変数に格納
    $ps = $db->query("SELECT * FROM chat_tb ORDER BY num");

    //時間に関する定数の定義======================================
    define("ONEMINUITE", 60);					//1分（秒）
    define("ONEHOUR",    60 * 60);				//1時間（秒）
    define("ONEDAY",     60 * 60 * 24);			//1日（秒）
    define("ONEWEEK",    60 * 60 * 24 * 7);		//1週間（秒）
    define("ONEMONTH",   60 * 60 * 24 * 30);	//1月（秒）
    define("ONEYEAR",    60 * 60 * 24 * 365);	//1年（秒）
    //===========================================================

    //経過時間を演算する関数の定義部===============================
    function elapsedTime($dest,$current) {      

        //現在時刻と投稿時刻のタイムスタンプとの差分を変数$ttに格納
        $tt =   $current - $dest;
        
        // 定数を用いて経過時間を表示する(例:経過時間が1年を超えている場合$ttと一年の商を小数部切捨てで変数に格納)
        if ($tt / ONEYEAR  > 1) return abs(round($tt / ONEYEAR))    . '年前';
        if ($tt / ONEMONTH > 1) return abs(round($tt / ONEMONTH))   . 'ヶ月前';
        if ($tt / ONEWEEK  > 1) return abs(round($tt / ONEWEEK))    . '週間前';
        if ($tt / ONEDAY   > 1) return abs(round($tt / ONEDAY))     . '日前';
        if ($tt / ONEHOUR  > 1) return abs(round($tt / ONEHOUR))    . '時間前';
        if ($tt / ONEMINUITE > 1)   return abs(round($tt / ONEMINUITE)) . '分前';
        if ($tt > 0)                return abs(round($tt)) . '秒前';
        //現在時刻=投稿時刻(送信時)
        return '現在';
    }
    //==========================================================  

    ?>
    
<!DOCTYPE html>
<html lang="" class="chat_html">
<head>
    <meta charset="UTF-8">
    <title>チャット画面</title>
	<meta name="Author" content=""/>
	<link rel="stylesheet" type="text/css" href="../css/chat.css">
    <link rel="shortcut icon" href="../image/favicon_wood_life.ico" type="image/vnd.microsoft.icon">
    <link rel="icon" href="../image/favicon_wood_life.ico" type="image/vnd.microsoft.icon">
    <meta name="robots" content="none,noindex,nofollow">
    <!-- <meta http-equiv="refresh" content="20"> -->
</head>
<body class="chat_body" id="scroll-inner">
    <header>
        <h1><?php print $_COOKIE['name_info'];?>様のChatページ</h1>
    </header>

    <main>
        <?php
        $message_conter = 0;
        define("admini", "管理者");//管理者ユーザー名
        
    

        while($r = $ps->fetch()){ 
        
            //投稿日時の格納
            $beforedest = $r['date'];
            //投稿日時をタイムスタンプに変換する
            $dest = strtotime($beforedest);
            //現在の時刻(タイムスタンプ)
            $current = time(); 
            //elapsedTime関数の実行
            $outstr = elapsedTime($dest,$current);

            if($set == $r["name"]){
            
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
                            $n=60; # 改行させる（半角での）文字数
                            $message_contents = $r['message'];
                                #文字数に応じた改行処理
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
                            
                            $message_conter++;
                        ?> 
                    </div> 

                </div>
                
            <?php 
        
            }elseif($r["name"] == admini && $r["receiver"] == $set){
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
                            $n=70; # 改行させる（半角での）文字数
                            $message_contents = $r['message'];

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

                            $message_conter++;
                        ?> 
                        
                    </div> 

                </div>
            <?php
        
            }
        }
            if($message_conter == 0){
                print("何かご質問ございましたら、ご自由にお書きください。");
            }
        
            ?>
            



        </div>
        <form action="" method="POST" class="form_wrapper">
            <input type="file" name="user_file">
            
            <input type="submit" id="submit" value="送信">or ctrl+Enter
            <a href="./Login.php" class="Logout">ログアウト</a>
            <div><textarea class="textarea" name="message"
            onkeydown="if(event.ctrlKey&&event.keyCode==13){
                            document.getElementById('submit').click();return false
            };" required></textarea></div>
        </form> 
    </main>
    <footer>

    </footer>
    <script type="text/javascript" src="../js/chat.js"></script>
</body>

</html>