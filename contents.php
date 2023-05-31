<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    session_start();
    ?>
  <title>Play2earn</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
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
    body {
      font-family: 'Montserrat', sans-serif;
    }
    h1{
        color: white;
    }
    p{
        color: white;
    }
    .header {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 999;
}
    .site-title {
      font-size: 32px;
      margin-top: 50px;
      margin-bottom: 30px;
      text-align: center;
      color: #333;
    }
    
    
    .main-content {
      padding: 50px;
    }
    .user-count {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 50px;
    }
    .user-count .count {
      font-size: 48px;
      font-weight: bold;
      color: #333;
    }
    .user-count .label {
      font-size: 24px;
      color: #777;
    }
    .user-button {
      font-size: 18px;
      font-weight: bold;
      background-color: #333;
      border-color: #333;
      margin-top: 20px;
    }
    .user-button:hover {
      background-color: #555;
      border-color: #555;
    }
    /* Dark mode styles */
    body.dark-mode {
      background-color: #333;
      color: #fff;
    }
    .navbar.dark-mode {
      background-color: #555;
      border-color: #555;
    }
    .navbar-brand.dark-mode,
    .navbar-nav > li > a.dark-mode {
      color: #fff !important;
    }
    .user-button.dark-mode {
      background-color: #555;
      border-color: #555;
    }
    .user-button.dark-mode:hover {
      background-color: #777;
      border-color: #777;
    }
    #slider {
  width: 100%;
  height: 500px;
  overflow: hidden;
  margin: 0 auto;
  display: flex;
  justify-content: center;
  align-items: center;
}

.slider-container {
  width: 100%;
  height: 100%;
  display: flex;
  transition: transform 0.5s ease;
}

.slider-container img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.title {
  font-size: 24px;
  font-weight: bold;
  text-align: center;
  margin-bottom: 10px;
}

.author,
.publish-date {
  font-size: 16px;
  text-align: center;
  margin-bottom: 5px;
}

.content {
  font-size: 18px;
  line-height: 1.5;
  text-align: justify;
  margin: 0 auto;
  max-width: 900px;
}

.image-container {
  display: flex;
  justify-content: center;
  margin-bottom: 10px;
}

.image-container img {
  max-width: 100%;
  max-height: 300px;
  object-fit: contain;
  margin: 0 5px;
}
.comment-form {
        text-align: center;
        margin-top: 20px;
        width: 40%;
        margin-left: auto;
        margin-right: auto;
    }

    .comment-form h2 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .comment-form textarea {
        width: 100%;
        height: 150px;
        margin-bottom: 10px;
        padding: 10px;
        resize: vertical;
    }

    .comment-form button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .comment-form button:hover {
        background-color: #45a049;
    }
h2{
    color: white;
}
.comments-container {
    margin: 0 auto;
    width: 80%;
    border: 1px solid #ccc;
    padding: 20px;
}

.comments-container h2 {
    text-align: center;
}

.comments {
    list-style: none;
    padding: 0;
}

.comments li {
    margin-bottom: 20px;
    border-bottom: 1px solid #ccc;
    padding-bottom: 10px;
}

.comment-author {
    font-weight: bold;
}

.comment-date {
    color: #888;
    font-size: 12px;
}

.comment-content {
    margin-top: 10px;
}
  </style>
</head>
<body>

<!-- Page Preloder -->
 <br><br><br>

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

// Gidilen content'in ID'sini al
$contentID = $_GET['id'];

// MySQL sorguları
$contentSql = "SELECT * FROM content WHERE contentid = $contentID";
$commentSql = "SELECT * FROM comments WHERE contentid = $contentID";

// İçeriği getir
$contentResult = $conn->query($contentSql);

// İçeriği kontrol et
if ($contentResult->num_rows > 0) {
    $contentRow = $contentResult->fetch_assoc();
    $title = $contentRow["title"];
    $content = $contentRow["content"];
    $author = $contentRow["author"];
    $publish_date = $contentRow["publish_date"];
    $image = $contentRow["image"];
    $image1 = $contentRow["image1"];
    $image2 = $contentRow["image2"];
    $image3 = $contentRow["image3"];

    // İçeriği görüntüle
    echo "<h1 class='title'>".$title."</h1>";
    echo "<p class='author'><strong>Yazar:</strong> ".$author."</p>";
    echo "<p class='publish-date'><strong>Yayınlanma Tarihi:</strong> ".$publish_date."</p>";
    echo "<div id='slider'>";
    echo "<div class='slider-container'>";
    echo "<img src='".$image."' alt='Resim 1'>";
    echo "<img src='".$image1."' alt='Resim 2'>";
    echo "<img src='".$image2."' alt='Resim 3'>";
    echo "<img src='".$image3."' alt='Resim 4'>";
    echo "</div>";
    echo "</div>";
    echo "<p class='content'>".$content."</p>";
    

    // Yorumları getir
    $commentResult = $conn->query($commentSql);

    // Yorumları kontrol et
    if ($commentResult->num_rows > 0) {
        echo "<br><br>";
        echo "<div class='comments-container'>";
        echo "<h2>Yorumlar</h2>";
        echo "<ul class='comments'>";
        while ($commentRow = $commentResult->fetch_assoc()) {
            $commentID = $commentRow["id"];
            $commentAuthor = $commentRow["username"];
            $commentDate = $commentRow["comment_date"];
            $commentContent = $commentRow["comment"];

            echo "<li>";
            echo "<p class='comment-author'>".$commentAuthor."</p>";
            echo "<p class='comment-date'>".$commentDate."</p>";
            echo "<p class='comment-content'>".$commentContent."</p>";

        



            // Sadece admin kullanıcıların yorumları silebilmesi
            if (isset($_SESSION['username'])) {
                $adminUserSql = "SELECT admin_user FROM users WHERE username = '".$_SESSION['username']."'";

                $adminUserResult = $conn->query($adminUserSql);

                if ($adminUserResult->num_rows > 0) {
                    $adminUserRow = $adminUserResult->fetch_assoc();
                    $adminUserValue = $adminUserRow["admin_user"];

                    if ($adminUserValue == 1) {
                        echo "<a href='delete_comment.php?id=".$commentID."' class='delete-comment'>Yorumu Sil</a>";
                    }
                }
            }

            echo "</li>";
        }
        echo "</ul>";
        echo "</div>";
    } else {
        echo "<div class='comments-container'>";
        echo "<p>Henüz yorum bulunmamaktadır.</p>";
        echo "</div>";
    }

    // Yorum ekleme formu
    if (isset($_SESSION['username'])) {
        echo "<div class='comment-form'>";
        echo "<h2>Yorum Yap</h2>";
        echo "<br>";
        echo "<form action='add_comment.php' method='POST'>";
        echo "<input type='hidden' name='contentid' value='" . $contentID . "'>";
        echo "<textarea name='comment' placeholder='Yorumunuzu buraya girin'></textarea>";
        echo "<button type='submit'>Gönder</button>";
        echo "</form>";
        echo "</div>";
    } else {
        echo "<p>Yorum yapabilmek için oturum açmanız veya kayıt olmanız gerekmektedir.</p>";
    }
} else {
    echo "İlgili içerik bulunamadı.";
}

// MySQL bağlantısını kapatın
$conn->close();
?>

<script>
const sliderContainer = document.querySelector('.slider-container');
const images = sliderContainer.querySelectorAll('img');
const imageWidth = images[0].clientWidth;
let currentImageIndex = 0;

sliderContainer.style.width = `${imageWidth}px`;
sliderContainer.style.overflow = 'hidden';

images.forEach((image, index) => {
  image.style.display = index === 0 ? 'block' : 'none';
  image.style.width = '100%';
  image.style.height = 'auto';
});

function slideImages() {
  images[currentImageIndex].style.display = 'none';

  currentImageIndex++;
  if (currentImageIndex >= images.length) {
    currentImageIndex = 0;
  }

  images[currentImageIndex].style.display = 'block';
}

setInterval(slideImages, 2000);
</script>
</body>
</html>