<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Haber</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/solid.css" integrity="sha384-Tv5i09RULyHKMwX0E8wJUqSOaXlyu3SQxORObAI08iUwIalMmN5L6AvlPX2LMoSE" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/fontawesome.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous"/>

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/plyr.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
   

    <!-- Header Section Begin -->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="header__logo">
                    <a href="/">
                        <img src="img/logo.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="header__nav">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="/">Anasayfa</a></li>
                           
                            <li><a href="/about">Hakkımızda</a></li>
                            <li><a href="/contact">İletişim</a></li>
                            <?php
                            session_start();
                            if (isset($_SESSION['username'])) {
                                // MySQL bağlantısı için gerekli bilgileri girin
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "mysite";

                                // MySQL bağlantısını oluşturun
                                $conn = new mysqli($servername, $username, $password, $dbname);

                                // Bağlantıyı kontrol edin
                                if ($conn->connect_error) {
                                    die("MySQL bağlantısı başarısız: " . $conn->connect_error);
                                }

                                // Oturum açmış kullanıcının adını alın
                                $username = $_SESSION['username'];

                                // Admin yetkisi kontrolü
                                $checkAdminSql = "SELECT admin_user FROM users WHERE username = '$username' AND admin_user = 1";
                                $checkAdminResult = $conn->query($checkAdminSql);

                                if ($checkAdminResult->num_rows > 0) {
                                    echo "<li><a href=\"/adminpanel\">Panel</a></li>";
                                }

                                // Çıkış yapma bağlantısı
                                echo '<li><a href="/logout">Çıkış Yap</a></li>';

                                // MySQL bağlantısını kapatın
                                $conn->close();
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="header__right">
                    <?php
                    if (!isset($_SESSION['username'])) {
                        // Oturum açma ve kayıt olma bağlantıları
                        echo '<a href="/register"><span class="icon_profile" style="color:green;"></span></a>';
                        echo '<a href="/login"><span class="icon_profile"></span></a>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>
<!-- Header End -->
    <section class="hero">
    <div class="container">
        <div class="hero__slider owl-carousel">
            <?php
            // MySQL bağlantısı için gerekli bilgileri girin
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "mysite";

            // MySQL bağlantısını oluşturun
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Bağlantıyı kontrol edin
            if ($conn->connect_error) {
                die("MySQL bağlantısı başarısız: " . $conn->connect_error);
            }

            // MySQL sorgusu
            $sql = "SELECT slider_image, slider_title, slider_router, slider_desc FROM slider";

            // Sorguyu çalıştır ve sonuçları al
            $result = $conn->query($sql);

            // Sonuçları kontrol et ve ekrana yazdır
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $sliderImage = $row["slider_image"];
                    $sliderTitle = $row["slider_title"];
                    $sliderRouter = $row["slider_router"];
                    $sliderDesc = $row["slider_desc"];
                    ?>
                    <div class="hero__items set-bg" data-setbg="<?php echo $sliderImage; ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="hero__text">
                                    
                                    <h2><?php echo $sliderTitle; ?></h2>
                                    <p><?php echo $sliderDesc; ?></p>
                                    <a href="<?php echo $sliderRouter; ?>"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "Veritabanında kayıt bulunamadı.";
            }

            // MySQL bağlantısını kapatın
            $conn->close();
            ?>
        </div>
    </div>
</section>
    <!-- Hero Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Son Eklenenler</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
    <div class="btn__all">
        <a href="#" class="primary-btn"> </a>
    </div>
</div>
</div>
<div class="row">
<?php
    // MySQL bağlantısı için gerekli bilgileri girin
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mysite";

    // MySQL bağlantısını oluşturun
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Bağlantıyı kontrol edin
    if ($conn->connect_error) {
        die("MySQL bağlantısı başarısız: " . $conn->connect_error);
    }

    // İçerik ID'sini alın
    if (isset($_GET['id'])) {
        $contentID = $_GET['id'];

        // İçeriğe tıklanıldığında view_count değerini 1 artır
        $updateSql = "UPDATE content SET view_count = view_count + 1 WHERE contentid = $contentID";
        $conn->query($updateSql);
    }

    // MySQL sorgusu
    $sql = "SELECT contentid, title, image, view_count FROM content";

    // Sorguyu çalıştır ve sonuçları al
    $result = $conn->query($sql);

    // Sonuçları kontrol et ve ekrana yazdır
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $contentID = $row["contentid"];
            $title = $row["title"];
            $image = $row["image"];
            $viewCount = $row["view_count"];
            ?>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="<?php echo $image; ?>">
                        <div class="comment"><i class="fa fa-comments"></i> 11</div>
                        <div class="view" id="view-count"><i class="fa fa-eye"></i> Views: <?php echo $viewCount; ?></div>
                    </div>
                    <div class="product__item__text">
                        
                        <h5><a href="contents.php?id=<?php echo $contentID; ?>"><?php echo $title; ?></a></h5>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo "Veritabanında kayıt bulunamadı.";
    }

    // MySQL bağlantısını kapatın
    $conn->close();
?>

</div>
</div>
                    <div class="popular__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                  
                                </div>
                            </div>
                        </div>
                        <div class="row">
                           
                           
                        </div>
                    </div>
                    <div class="recent__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                   
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                   
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            
                           
                           
                           
                           
                        </div>
                    </div>
                    <div class="live__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                  
                                </div>
                            </div>
                        </div>
                        <div class="row">
                           
                           
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
    <div class="product__sidebar">
        <div class="product__sidebar__view">
            <div class="section-title">
                <h5>Çok Okunanlar</h5>
            </div>

            <?php
            // MySQL bağlantısı için gerekli bilgileri girin
            $servername = "localhost";
            $username = "root";
            $password = "5dbe7fb9c43e6afcd1ae0401e979a8d4cd2d5685e3a8cc47";
            $dbname = "mysite";
        
            // MySQL bağlantısını oluşturun
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Bağlantıyı kontrol edin
            if ($conn->connect_error) {
                die("MySQL bağlantısı başarısız: " . $conn->connect_error);
            }

            // MySQL sorgusu
            $sql = "SELECT title, image, view_count FROM content ORDER BY view_count DESC LIMIT 4";

            // Sorguyu çalıştır ve sonuçları al
            $result = $conn->query($sql);

            // Sonuçları kontrol et ve ekrana yazdır
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $title = $row["title"];
                    $image = $row["image"];
                    $viewCount = $row["view_count"];
                    ?>
                    <div class="product__sidebar__view__item set-bg mix day years" data-setbg="<?php echo $image; ?>">
                        
                        <div class="view"><i class="fa fa-eye"></i> <?php echo $viewCount; ?></div>
                        <h5><a href="#"><?php echo $title; ?></a></h5>
                    </div>
                    <?php
                }
            } else {
                echo "Veritabanında kayıt bulunamadı.";
            }

            // MySQL bağlantısını kapatın
            $conn->close();
            ?>

        </div>
    </div>
</div>
        </div>
    </div>
</section>
<!-- Product Section End -->

<!-- Footer Section Begin -->
<footer class="footer">
    <div class="page-up">
        <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer__logo">
                    <a href="./index.html"><img src="img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer__nav">
                    <ul>
                        <li class="active"><a href="./index.html">Homepage</a></li>
                        <li><a href="./categories.html">Categories</a></li>
                        <li><a href="./blog.html">Our Blog</a></li>
                        <li><a href="#">Contacts</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
              

              </div>
          </div>
      </div>
  </footer>
  <!-- Footer Section End -->

  <!-- Search model Begin -->
  <div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="icon_close"></i></div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search model end -->

<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/player.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/mixitup.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>


</body>

</html>
