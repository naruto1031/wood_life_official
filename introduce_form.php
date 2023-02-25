<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="none,noindex,nofollow">
    <link rel="stylesheet" href="./css/intro_form.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="./image/favicon_wood_life.ico" type="image/vnd.microsoft.icon">
    <link rel="icon" href="./image/favicon_wood_life.ico" type="image/vnd.microsoft.icon">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <title>Wood Life</title>
    <script src="https://kit.fontawesome.com/15831abafd.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            //位置・時間調整
            var adjust = -60;
            var time = 600;
            
            //URLのハッシュ値を取得
            var urlHash = location.hash;
            //ハッシュ値があればページ内スクロール
            if(urlHash) {
              //スクロールを0に戻しておく
              $('body,html').stop().scrollTop(0);
              setTimeout(function () {
                //ロード時の処理を待ち、時間差でスクロール実行
                scrollToAnker(urlHash) ;
              }, 100);
            }
            
            //通常のクリック時
            $('a[href^="#"]').on('click', function(event) {
              event.preventDefault();
              
              // ハッシュ値を取得して URI デコードする
              var decodedHash = decodeURI(this.hash);
              // ハッシュの確認
              console.log(decodedHash);
              //リンク先が#か空だったらhtmlに
              var hash = decodedHash == "#" || decodedHash == "" ? 'html' : decodedHash;
              //スクロール実行
              scrollToAnker(hash);
              return false;
            });
            
            // 関数：スムーススクロール
            // 指定したアンカー(#ID)へアニメーションでスクロール
            function scrollToAnker(hash) {
              var target = $(hash);
              var position = target.offset().top + adjust;
              $('body,html').stop().animate({scrollTop:position}, time, 'swing');
            }
          })
    </script>
</head>
<body>
    <header> 
        <div class="header_content01">  
            <img src="image/Wood_Life_logo_02.png" alt="Wood_Life_logo"> 
            <nav>
                <ul>
                    <a href="./index.php" class="rink_01"><li>ホーム</li></a>
                    <a href="./price.php" class="rink_01"><li>価格目安</li></a>
                    <a href="./construction.php" class="rink_01"><li>施工例</li></a>
                    <a href="#com" class="rink_01"><li>会社概要</li></a>
                    <a href="#form" class="rink_01"><li>お問い合わせ</li></a>
                    <div class="Icon">
                        <a href=""><i class="fab fa-instagram" target="_brank"></i></a>
                        <a href="https://www.youtube.com/channel/UCJ1fsxdIX6WbDScv0F-_khw" target="_brank"><i class="fab fa-youtube"></i></a>
                        <a href="http://blog.niwablo.jp/dekkiyasan/" target="_brank"><i class="fa-solid fa-blog"></i></a>
                    </div>
                </ul>

            </nav>
            <h2>Wood Life</h2><!-- Use WebFont snell Roudhand-->
        </div>  

        <div class="slider_img">
            <img src="./image/IMG_1268.png" id="slide_img" class="slider img"/>
        </div>


        <div class="header_content02">
            
            <h4>生活をより豊かにする</h4>

            <h3>会社紹介・お問い合わせ</h3>

        </div>
    </header>

    <main>
        <div id="com"></div>
        <article class="article_content_03">
            <div class="contents">
                <h2>会社概要</h2>
            </div>

            <dl>
                <dt>会社名</dt>
                <dd>Wood Life</dd>
                <dt>代表者</dt>
                <dd>xxxxx(一級建築士 第00000号)</dd>
                <dt>創業年</dt>
                <dd>2004年4月</dd>
                <dt>所在地</dt>
                <dd>〒000-0000 埼玉県さいたま市xx区xxxx000-00</dd>
                <dt>TELL・FAX</dt>
                <dd>048-000-0000</dd>
                <dt>事業内容</dt>
                <dd>
                    ウッドデッキ・フェンス等
                    ガーデニングアイテムの制作
                </dd>
            </dl>            
            <div class="txt_03">
                <p>ご相談は、メール、電話・FAX、DM機能などで行っております。ほんの些細なことでも構いません。これからどうしようと考えている方は、どうぞお気軽にご相談ください</p>
            </div>
        </article>

        <div id="form"></div>
        
            <div class="Form">
            <form action="./PHP/mail.php" method="post">
                <div class="contents">
                    <h2>お問い合わせ</h2>
                </div>
                <div class="Form-Item">
                <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>氏名</p>
                <input type="text" class="Form-Item-Input" placeholder="例）山田太郎" name="title" required>
                </div>
                <div class="Form-Item">
                <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>電話番号</p>
                <input type="text" class="Form-Item-Input" placeholder="例）000-0000-0000" name="number" required>
                </div>
                <div class="Form-Item">
                <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>メールアドレス</p>
                <input type="email" class="Form-Item-Input" placeholder="例）example@gmail.com" name="to" required>
                </div>
                <div class="Form-Item">
                <p class="Form-Item-Label isMsg"><span class="Form-Item-Label-Required">必須</span>お問い合わせ内容</p>
                <textarea class="Form-Item-Textarea" name="coment" required></textarea>
                </div>
                <input type="submit" class="Form-Btn" value="送信する">
            </form>
            </div>
        
    </main>
    <footer>
        <div class="footer_contents">
            <div class="footer_logo">
                <img src="./image/Wood_Life_logo_02.png" alt="Wood_Life_logo">
            </div>
            <div class="com_info">
                <p>xxx-xxx 埼玉県xxxxxx</p>
                <p>TELL: 080-xxxx-xxxx FAX 0570-xxxx.com</p>
                <p>xxx.xxx@xxxx.com</p>
            </div>
        </div>
        <small>@Wood Life all rights reserved</small>
    </footer>
</body>
</html>