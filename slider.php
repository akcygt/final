<!DOCTYPE html>
<html>
<head>
    <title>Slider Başlıkları</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
        .edit-icon {
            cursor: pointer;
        }
        tr{
            color: white;
        }
        h2{
            color: white;
        }
    </style>
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
                            <li><a href="#">İletişim</a></li>
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
<br><br><br>
    <div class="container">
        <h2>Slider Başlıkları</h2>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Başlık</th>
                    <th scope="col">Düzenle</th>
                </tr>
            </thead>
            <tbody>
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
                $sql = "SELECT id, slider_title FROM slider";

                // Sorguyu çalıştır ve sonuçları al
                $result = $conn->query($sql);

                // Sonuçları kontrol et ve tabloya ekle
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $sliderID = $row["id"];
                        $sliderTitle = $row["slider_title"];
                        ?>
                        <tr>
                            <td><?php echo $sliderTitle; ?></td>
                            <td>
                                <a href="slideredit.php?id=<?php echo $sliderID; ?>">
                                    <i class="fas fa-edit edit-icon"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='2'>Veritabanında kayıt bulunamadı.</td></tr>";
                }

                // MySQL bağlantısını kapatın
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>