<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="none,noindex,nofollow">
    <link rel="stylesheet" href="./css/price.css">
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
            <img src="image/Wood_Life_logo02.png" alt=""> 
            <nav>
                <ul>
                    <a href="./index.php" class="rink_01"><li>ホーム</li></a>
                    <a href="./price.php" class="rink_01"><li>価格目安</li></a>
                    <a href="./construction.php" class="rink_01"><li>施工例</li></a>
                    <a href="./introduce_form.php#com" class="rink_01"><li>会社概要</li></a>
                    <a href="./introduce_form.php#form" class="rink_01"><li>お問い合わせ</li></a>
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
            <img src="./image/udk20110916ust01.png" id="slide_img" class="slider img"/>
        </div>


        <div class="header_content02">
            
            <h4>生活をより豊かにする</h4>

            <h3>価格目安</h3>

        </div>
    </header>
    <main>
        <article class="article_cotent_01">
            <div class="contents_num_01"><p>01</p></div>
            <img src="./image/namekawadk-01.jpg" class="contents_img" alt="namekawadk-01">
            <div class="contents">
                <h2>ウッドデッキ</h2>
                <p class="sub_title">天然木の温かみを感じられるデッキです</p>
                <h3 class="sub_content">料金　････････････<span>￥122,000～</span>(施工費用込)</h3>
            </div>
            <div class="sub_txt">
                <h3>・デッキ材詳細</h3>
                <p>床板･･･105mm×30㎜(巾10.5cm・厚さ3cm)</p>
                <p>床板隙間･･･5mm</p>
                <p>千鳥貼り</p>
                <p>根太･･･ 70mm×70mm</p>
                <p>デッキの仕上り高さ･･･500mm(束の高さ50cm)※1</p>
                <p>※1,高さの制限はありません。下記の目安の場合です</p>
            </div>
            <dl>
                <h3>価格目安表</h3><p>※さいたま市・その近辺の場合です。工事費・消費税込み、引渡しの価格です。</p>
                <dt>2m×1m</dt>
                <dd>巾2000mm×奥行き1000mm:￥122,000～</dd>
                <dt>3m×1m</dt>
                <dd>巾3000mm×奥行き1000mm:￥148,000～</dd>
                <dt>2m×2m</dt>
                <dd>巾2000mm×奥行き2000mm:￥171,000～</dd>
                <dt>3m×1.5m</dt>
                <dd>巾3000mm×奥行き1500mm:￥216,000～</dd>
                <dt>3m×2m</dt>
                <dd>巾3000mm×奥行き2000mm:￥216,000～</dd>
                <dt>3m×2.5m</dt>
                <dd>巾3000mm×奥行き2500mm:￥298,000～</dd>
                <dt>4m×2m</dt>
                <dd>巾4000mm×奥行き2000mm:￥297,000～</dd>
                <dt>3m×3m</dt>
                <dd>巾3000mm×奥行き3000mm:￥335,000～</dd>
                <dt>4m×3m</dt>
                <dd>巾4000mm×奥行き3000mm:￥452,000～</dd>
            </dl>
        </article>
        <article class="article_content_02">
            <div class="contents_num_02"><p>02</p></div>
            <img src="./image/flsthk01.jpg" alt="flsthk01" class="contents_img">
            <div class="contents">
                <h2>フラワースタンド</h2>
                <p class="sub_title">花をより美しく魅せる逸品</p>
                <h3 class="sub_content">料金　････････････<span>￥15,000～</span>(施工費用込)</h3>
            </div>
            <div class="sub_txt">
                <h3>・商品説明</h3>
                <p>2段 : 高さ55cm・幅50cm・奥行34cm(下段取り外し可)</p>
                <p>3段 : 高さ90cm・幅50cm・奥行36cm(下段・中段取り外し可)</p>
            </div>
            <dl>
                <dt>スタンダードタイプ</dt>
                <dd>2段:￥15,000～</dd>
                <dt>トールタイプ</dt>
                <dd>3段:￥19,000～</dd>
            </dl>
        </article>

        <article class="article_content_03">
            <div class="contents_num_03"><p>03</p></div>
            <img src="./image/kdrfg.jpg" alt="kdrfg" class="content_03_1">
            <img src="./image/kdrfm.jpg" alt="kdrfm" class="content_03_2">
            <i class="fa-solid fa-arrow-right"></i>
            <div class="contents">
                <h2>ガーデンアイテム・リフォーム</h2>
                <p class="sub_title">DIYや他社で制作されたガーデニングアイテムをメンテナンス</p>
                <h3 class="sub_content">料金　････････････<span>   応相談</span></h3>               
            </div>
            <div class="txt_03">
                <p>「作ったはいいものの、ほったらかしで使っていない」「がたつき・傾き・老朽化・撤去」etc.. 理由は様々あると思います。</p>
                <p>これからどうしようと考えている方は、お気軽にご相談ください</p>
            </div>
        </article>
    </main>
    <footer>
        <div class="footer_contents">
            <div class="footer_logo">
                <img src="./image/Wood_Life_logo02.png" alt="Wood_Life_logo">
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