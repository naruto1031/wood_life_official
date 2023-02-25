<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css?v=2" rel="stylesheet">
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
            <img src="image/Wood_Life_logo.png" alt="Wood_Life_logo"> 
            <nav>
                <ul>
                    <a href="" class="rink_01"><li>ホーム</li></a>
                    <a href="./price.php" class="rink_01"><li>価格目安</li></a>
                    <a href="./construction.php" class="rink_01"><li>施工例</li></a>
                    <a href="./introduce_form.php#com" class="rink_01"><li>会社概要</li></a>
                    <a href="./introduce_form.php#form" class="rink_01"><li>お問い合わせ</li></a>
                    <div class="Icon">
                        <a href=""><i class="fab fa-instagram" target="_blank"></i></a>
                        <a href="https://www.youtube.com/channel/UCJ1fsxdIX6WbDScv0F-_khw" target="_blank"><i class="fab fa-youtube" target="_blank"></i></a>
                        <a href="http://blog.niwablo.jp/dekkiyasan/" target="_blank"><i class="fa-solid fa-blog" target="_blank"></i></a>
                    </div>
                </ul>
            </nav>
            <h2>Wood Life</h2><!-- Use WebFont snell Roudhand-->
        </div>  

        <div class="slider_img">
            <img src="./image/endai03.png" id="slide_img" class="slider img"/>
        </div>


        <div class="header_content02">
            
            <h4>生活をより豊かにする</h4>
            <a href="./PHP/Login.php">ご相談はこちらから</a>

        </div>
    </header>


    <main>
        <article class="article_cotents">
            <div class="contents_num_01"><p>01</p></div>
            <img src="./image/chibadkins.jpg" class="contents_img" alt="chabaikns">
            <div class="content_01">
                <h2>ウッドデッキ・木製家具が欲しいあなたに</h2>
                <p class="sub_title">本当に欲しいものを欲しい人へ</p>
                <h3 class="sub_content">建築のプロが完全オーダーメイドでお作りします</h3>
                <p class="sub_txt">
                    一級建築士の資格を持つ現職大工が施工を担当。ご希望のイメージやサイズなどを細かく伺い、お客様の「できたらいいな・・・」
                    「あったらいいな・・・」を形にします。この柔軟さとクオリティのバランスの良さは、どの業者にも負けません!!!!
                </p>
            </div>
        </article>

        <article class="article_cotents">
            <div class="contents_num_02"><p>02</p></div>
            <img src="./image/udkzk20110922-3.jpg" class="contents_img_02" alt="udkzk20110922-3">
            <div class="content_02"> 
                <h2>低価格で高品質を実現</h2>
                <h3 class="sub_content_02">直接施工&長く使えて味が出るウリン材</h3>
                <p class="sub_txt_02">
                    直接施工で中間マージンを抑え、防虫・防腐材不使用で長期間使えるウリン材を用いることで、低価格を実現しています。
                    ウリン材は、市販の材木よりも比較的高額ですが、長期的視野で見ることが大切です。
               </p>
            </div>
            <div class="button01">
                <a href="./price.html">価格目安はこちらから</a>
            </div>
        </article>
        <div class="last_article">
            <div class="last_contents">

                <article class="article_cotents_01">
                    <div class="contents_num_03"><p>03</p></div>
                    <div class="content_03">
                        <h2>いつでもご相談承っております</h2>
                        <h3>DM機能開設!!!!!是非ご利用ください
                        </h3>
                        <p class="sub_txt_03">
                            お客様がお気軽に相談が行えるよう、当サイトにダイレクトメッセージサイトを開設いたしました!
                            是非ご利用ください。※簡単な会員登録が必要です。
                        </p>
                    </div>
                    <div class="button02">
                        <a href="./PHP/Login.php">ご相談はこちらから</a>
                    </div>
                </article>
                
                <article class="article_cotents_02">
                    <div class="contents_num_04"><p>04</p></div>
                    <img src="./image/uds3-12.jpg" class="contents_img_03" alt="uds3-12">
                    <div class="content_03">
                        <h2>修理や手直しもお任せください</h2>
                        <h3>アフターサポートもしっかり行います</h3>
                        <p class="sub_txt_03">
                            長く使っていただくため、施工後の修理・手直しも低価格で行っております。
                            チャット機能・電話・メールからお問い合わせください。
                        </p>
                    </div>
                </article>
            </div>
        </div>
    </main>
    



    <footer>
        <div class="footer_contents">
            <div class="footer_logo">
                <img src="./image/Wood_Life_logo.png" alt="Wood_Life_logo">
            </div>
            <div class="com_info">
                <p>xxx-xxx 埼玉県xxxxxx</p>
                <p>TELL: 080-xxxx-xxxx FAX 0570-xxxx.com</p>
                <p>xxx.xxx@xxxx.com</p>
            </div>
        </div>
        <small>@Wood Life all rights reserved</small>
    </footer>
    <script src="./js/wood.js"></script>
</body>
</html>