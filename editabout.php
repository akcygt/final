<?php session_start(); ?>
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
<style>
    h2{
        color: white;
    }
    label{
        color: white;
    }
    .header {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 999;
}
</style>
<body>
   >

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

// Oturum açmış kullanıcının adını alın
$username = $_SESSION['username'];

// Admin yetkisi kontrolü
$checkAdminSql = "SELECT admin_user FROM users WHERE username = '$username' AND admin_user = 1";
$checkAdminResult = $conn->query($checkAdminSql);

if ($checkAdminResult->num_rows > 0) {
    // About bilgilerini al
    $aboutSql = "SELECT * FROM about";
    $aboutResult = $conn->query($aboutSql);

    if ($aboutResult->num_rows > 0) {
        $row = $aboutResult->fetch_assoc();
        $title = $row["title"];
        $author = $row["author"];
        $time = $row["time"];
        $content = $row["content"];

        // About formunu görüntüle
        echo "<style>
            .form-container {
                width: 400px;
                margin: 0 auto;
            }

            .form-container h2 {
                text-align: center;
            }

            .form-container label {
                display: block;
                margin-bottom: 5px;
            }

            .form-container input[type='text'],
            .form-container textarea {
                width: 100%;
                padding: 8px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            .form-container button[type='submit'] {
                background-color: #4CAF50;
                color: #fff;
                padding: 10px 15px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                width: 100%;
            }
            .textare{
                height:250px;
            }
        </style>";
        echo "<br><br><br><br><br>";

        echo "<div class='form-container'>";
        echo "<h2>About Düzenle</h2>";
        echo "<form action='updateabout.php' method='POST'>";
        echo "<label for='title'>Başlık:</label>";
        echo "<input type='text' id='title' name='title' value='" . $title . "'>";
        echo "<label for='author'>Yazar:</label>";
        echo "<input type='text' id='author' name='author' value='" . $author . "'>";
        echo "<label for='time'>Zaman:</label>";
        echo "<input type='text' id='time' name='time' value='" . $time . "'>";
        echo "<label for='content'>İçerik:</label>";
        echo "<textarea id='content' name='content' class='textare'>" . $content . "</textarea>";
        echo "<button type='submit'>Güncelle</button>";
        echo "</form>";
        echo "</div>";
    } else {
        echo "About bilgisi bulunamadı.";
    }
} else {
    echo "Bu sayfayı düzenlemek için admin yetkisine sahip olmanız gerekmektedir.";
}

// MySQL bağlantısını kapatın
$conn->close();
?>
</body>

</html>