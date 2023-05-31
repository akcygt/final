<?php
session_start();
?>
<!DOCTYPE html>
<html>
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
    <style>
        .unread {
            font-weight: bold;
        }

        .ttt {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .message {
            display: block;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            text-decoration: none;
            color: white;
        }

        .message:hover {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
   
    <!-- Header Section Begin -->
<header class="header">
    <div class="container" class="ttt">
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

<br><br><br>
    <div class="container" class="ttt">
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

        // İletişim mesajlarını getir
        $messagesSql = "SELECT id, name, time, is_read FROM contact";
        $messagesResult = $conn->query($messagesSql);

        // Mesajları kontrol et
        if ($messagesResult->num_rows > 0) {
            while ($row = $messagesResult->fetch_assoc()) {
                $messageID = $row["id"];
                $messageName = $row["name"];
                $messageTime = $row["time"];
                $isRead = $row["is_read"];

                // Mesajın içeriği için ayrıntı sayfasının URL'sini oluştur
                $messageURL = "message.php?id=" . $messageID;

                // Mesajları görüntüle
                echo "<a class='message";
                if (!$isRead) {
                    echo " unread";
                }
                echo "' href='$messageURL'>";
                echo "$messageName - $messageTime";
                echo "</a>";

                // Mesaj okundu olarak işaretlenmişse is_read değerini güncelle
                if (!$isRead) {
                    $updateSql = "UPDATE contact SET is_read = 1 WHERE id = $messageID";
                    $conn->query($updateSql);
                }
            }
        } else {
            echo "<p>Hiç iletişim mesajı bulunamadı.</p>";
        }

        // MySQL bağlantısını kapat
        $conn->close();
        ?>
    </div>
</body>
</html>