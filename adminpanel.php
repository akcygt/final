<!DOCTYPE html>
<html lang="en">

<head>
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
    .site-title {
      font-size: 32px;
      margin-top: 50px;
      margin-bottom: 30px;
      text-align: center;
      color: #333;
    }
    .navbar {
      background-color: #333;
      border-color: #333;
    }
    .navbar-brand,
    .navbar-nav > li > a {
      color: #fff !important;
      font-size: 18px;
    }
    .navbar-brand {
      font-size: 24px;
      font-weight: bold;
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
    .table-bordered {
      border: 1px solid #ccc;
    }
    .table-bordered th, .table-bordered td {
      border: 1px solid #ccc;
    }
    .header {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 999;
}
  </style>
</head>

<body>
  <?php
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
<?php
//connect to database
$db = mysqli_connect("localhost", "root", "", "mysite");

// check if user is logged in and has admin access
$userIsAdmin = false;


if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];

  // query to check if the user is an admin
  $isAdminQuery = "SELECT admin_user FROM users WHERE username = '$username' AND admin_user = 1";
  $isAdminResult = mysqli_query($db, $isAdminQuery);

  if (mysqli_num_rows($isAdminResult) > 0) {
    $userIsAdmin = true;
  }
}

if (!$userIsAdmin) {
  // Redirect or show an error message if the user is not an admin
  echo "Admin yetkisi gerektiren bu sayfaya erişiminiz yok.";
  exit();
}
?>

<div class="container">
  <h1 class="site-title">Admin Paneli</h1>
  <main class="main-content">
    <?php
      // get user count
      $user_count_query = "SELECT COUNT(*) as total FROM users";
      $user_count_result = mysqli_query($db, $user_count_query);
      $user_count_row = mysqli_fetch_assoc($user_count_result);

      // get post count
      $sql_post_count = "SELECT COUNT(*) AS post_count FROM content";
      $result_post_count = mysqli_query($db, $sql_post_count);
      $post_count = mysqli_fetch_assoc($result_post_count)['post_count'];
    ?>

    <div class="row">
      <div class="col-md-6">
        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title">Üye Sayısı</h5>
            <?php
              // get user count
              $sql_user_count = "SELECT COUNT(*) AS user_count FROM users";
              $result_user_count = mysqli_query($db, $sql_user_count);
              $user_count = mysqli_fetch_assoc($result_user_count)['user_count'];
            ?>
            <table class="table table-bordered">
              <tr>
                <td style="width: 50%;">Kullanıcı Sayısı</td>
                <td style="width: 50%;"><a href="users.php" class="btn btn-primary">Üyeler</a></td>
              </tr>
              <tr>
                <td colspan="2"><?php echo $user_count; ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title">Post Sayısı</h5>
            <table class="table table-bordered">
              <tr>
                <td style="width: 50%;">Gönderi Sayısı</td>
                <td style="width: 50%;"><a href="content" class="btn btn-primary">Gönderiler</a></td>
              </tr>
              <tr>
                <td colspan="2"><?php echo $post_count; ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title">Açıklama Güncelle</h5>
            <table class="table table-bordered">
              <tr>
                <td style="width: 50%;"><a href="editabout" class="btn btn-primary">Açıklama</a></td>
                <td style="width: 50%;"></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title">İletişim</h5>
            <table class="table table-bordered">
              <tr>
                <td style="width: 50%;"><a href="contact" class="btn btn-primary">İletişim</a></td>
                <td style="width: 50%;"></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title">Slider</h5>
            <table class="table table-bordered">
              <tr>
                <td style="width: 50%;"><a href="slider" class="btn btn-primary">Slider Güncelle</a></td>
                <td style="width: 50%;"></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>

</body>
</html>