<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
    <meta charset="UTF-8">
    <title>Create Post</title>
    <style>
        /* global styles */
        body {
          font-family: Arial, sans-serif;
          font-size: 16px;
          line-height: 1.5;
          margin: 0;
          padding: 0;
        }

        h1 {
          font-size: 36px;
          font-weight: bold;
          text-align: center;
        }

        form {
          max-width: 600px;
          margin: 0 auto;
          padding: 20px;
          border: 1px solid #ccc;
          border-radius: 5px;
        }

        label {
          display: block;
          margin-bottom: 5px;
          font-weight: bold;
        }

        input[type="text"],
        textarea {
          display: block;
          width: 100%;
          padding: 10px;
          margin-bottom: 20px;
          border: 1px solid #ccc;
          border-radius: 5px;
          box-sizing: border-box;
        }

        input[type="file"] {
          margin-bottom: 20px;
        }

        input[type="submit"] {
          display: block;
          width: 100%;
          padding: 10px;
          background-color: #007bff;
          color: #fff;
          border: none;
          border-radius: 5px;
          cursor: pointer;
          transition: background-color 0.3s ease-in-out;
        }

        input[type="submit"]:hover {
          background-color: #0056b3;
        }
        label{
          color: white;
          margin-top: 40px;
        }
    </style>
</head>
<body>
  <?php
         $servername = "localhost";
         $username = "root";
         $password = "";
         $dbname = "adminpanel";

         // MySQL bağlantısını oluşturma
         $conn = new mysqli($servername, $username, $password, $dbname);

         // Bağlantıyı kontrol etme
         if ($conn->connect_error) {
             die("MySQL bağlantısında hata oluştu: " . $conn->connect_error);
         }

         // Oturum başlatma veya devam ettirme
         session_start();
  ?>
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
    <br><br><br>
    <form action="createpost_process.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" required>
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea name="content" rows="10" required></textarea>
        </div>
        <div>
            <label for="author">Author:</label>
            <?php
            // MySQL bağlantısı yapılacak bilgiler
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "mysite";

            // MySQL bağlantısını oluşturma
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Bağlantıyı kontrol etme
            if ($conn->connect_error) {
                die("MySQL bağlantısında hata oluştu: " . $conn->connect_error);
            }

            // Oturum başlatma veya devam ettirme
            

            // Oturumdaki kullanıcı adını al
            $currentUser = $_SESSION['username'];

            // MySQL sorgusu ile kullanıcının tam adını çek
            $sql = "SELECT username FROM users WHERE username = '$currentUser'";
            $result = $conn->query($sql);

            // Kullanıcının tam adını al
            $author = "";     if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
              $author = $row["username"];
          }
          
          // Veritabanı bağlantısını kapat
          $conn->close();
          ?>
          
          <input type="text" name="author" value="<?php echo $author; ?>" required readonly s>
      </div>
      <div>
          <label for="image">Image:</label>
          <input type="file" name="image">
      </div>
      <div>
          <label for="image1">Image1:</label>
          <input type="file" name="image1">
      </div>
      <div>
          <label for="image2">Image2:</label>
          <input type="file" name="image2">
      </div>
      <div>
          <label for="image3">Image3:</label>
          <input type="file" name="image3">
      </div>
      <div>
          <input type="submit" value="Create Post">
      </div>
  </form>
</body>
</html>