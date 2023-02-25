<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="css/construction.css?v=2" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="./image/favicon_wood_life.ico" type="image/vnd.microsoft.icon">
    <link rel="icon" href="./image/favicon_wood_life.ico" type="image/vnd.microsoft.icon">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <title>Wood Life</title>
    <meta name="robots" content="none,noindex,nofollow">
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
            <img src="image/Wood_Life_logo_03.png" alt="Wood_Life_logo"> 
            <nav>
                <ul>
                    <a href="./index.php" class="rink_01"><li>ホーム</li></a>
                    <a href="./price.php" class="rink_01"><li>価格目安</li></a>
                    <a href="" class="rink_01"><li>施工例</li></a>
                    <a href="./introduce_form.php#com" class="rink_01"><li>会社概要</li></a>
                    <a href="./introduce_form.php#form" class="rink_01"><li>お問い合わせ</li></a>
                    <div class="Icon">
                        <a href=""><i class="fab fa-instagram" target="_blank"></i></a>
                        <a href="https://www.youtube.com/channel/UCJ1fsxdIX6WbDScv0F-_khw" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a href="http://blog.niwablo.jp/dekkiyasan/" target="_blank"><i class="fa-solid fa-blog"></i></a>
                    </div>
                </ul>
            </nav>
            <h2>Wood Life</h2><!-- Use WebFont snell Roudhand-->
        </div>  

        <div class="slider_img">
            <img src="./image/IMG_1268_01.png"  class="slider img" alt="IMG_1268_01">
        </div>


        <div class="header_content02">
            
            <h4>生活をより豊かにする</h4>

            <h3>施工例(1部)</h3>

        </div>
    </header>
    <main>
        <article>
            <div>
                <img src="image/chibadkins.jpg" alt="chibadkins">
                <h3>埼玉県xxx市</h3>
                <p> 
                    ウリン材の質感をしっかりと感じられるデッキです。
                </p>        
            </div>
            <div>
                <img src="image/endai03.jpg" alt="endai03">
                <h3>埼玉県xxx市</h3>
                <p>
                    建物側にコンクリートのステップがありましたが、その上からの施工はできます。
                </p>        
            </div>
            <div>
                <img src="image/IMG_1269.JPG" alt="MG_1269">
                <h3>埼玉県xxx市</h3>
                <p>このような広い規模のデッキ制作も承っています</p>        
            </div>
        </article>
        <article>
            <div>
                <img src="image/namekawadk-01.jpg" alt="namekawadk">
                <h3>埼玉県xxx市</h3>
                <p>6帖の大きさで、リビングが一つ増えた感じです。</p>        
            </div>
            <div>
                <img src="image/udk20110916ust.jpg" alt="udk20110916ust">
                <h3>埼玉県xxx市</h3>
                <p>ちょっとした空間に癒しの場を与えてくれます。</p>        
            </div>
            <div>
                <img src="image/IMG_1521.JPG" alt="IMG_1521">
                <h3>埼玉県xxx市</h3>
                <p>大規模施工でこういったものも制作した実績があります。</p>        
            </div>
        </article>
        <article>
            <div>
                <img src="image/IMG_0348.JPG" alt="IMG_0348">
                <h3>埼玉県xxx市</h3>
                <p>自然あふれる場所に置けば、みんなの憩いの場に</p>        
            </div>
            <div>
                <img src="image/uds3-12.jpg" alt="uds3-12">
                <h3>埼玉県xxx市</h3>
                <p>木を囲んだこんなおしゃれなデッキもつくれちゃいます。</p>        
            </div>
            <div>
                <img src="image/pic20006.jpg" alt="pic20006">
                <h3>埼玉県xxx市</h3>
                <p>ウッドステップなども取り扱っております。</p>        
            </div>
        </article>
    </main>
    <footer>
        <div class="footer_contents">
            <div class="footer_logo">
                <img src="./image/Wood_Life_logo_03.png" alt="Wood_Life_logo">
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