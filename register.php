<?php
session_start();
//connect to database
$db=mysqli_connect("localhost","root","","mysite");
if(isset($_POST['register_btn']))
{
    $username=mysqli_real_escape_string($db,$_POST['username']);
    $email=mysqli_real_escape_string($db,$_POST['email']);
    $password=mysqli_real_escape_string($db,$_POST['password']);
    $password2=mysqli_real_escape_string($db,$_POST['password2']);  
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result=mysqli_query($db,$query);
      if($result)
      {
     
        if( mysqli_num_rows($result) > 0)
        {
                
                echo '<script language="javascript">';
                echo 'alert("Username already exists")';
                echo '</script>';
        }
        
          else
          {
            
            if($password==$password2)
            {           //Create User
                $password=md5($password); //hash password before storing for security purposes
                $sql="INSERT INTO users(username, email, password ) VALUES('$username','$email','$password')"; 
                mysqli_query($db,$sql);  
                $_SESSION['message']="You are now logged in"; 
                $_SESSION['username']=$username;
                header("location: /");  //redirect admin page
            }
            else
            {
                $_SESSION['message']="The two password do not match";   
            }
          }
      }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Rabbani sarkar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Play2earn</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
  <link rel="stylesheet" href="style.css">
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
    .header {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 999;
}
.form-group{
  color: white;
  font-size: 13px;
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


<div class="container">
  <h1 class="text-center" style="color: green;"></h1>

  <main class="main-content">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <?php
        if(isset($_SESSION['message'])) {
          echo "<div id='error_msg'>".$_SESSION['message']."</div>";
          unset($_SESSION['message']);
        }
        ?>
        <form method="post" action="register.php">
          <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" class="form-control" id="username" required>
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" id="email" required>
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" id="password" required>
          </div>
          <div class="form-group">
            <label for="password2">Confirm Password:</label>
            <input type="password" name="password2" class="form-control" id="password2" required>
          </div>
          <button type="submit" name="register_btn" class="btn btn-primary btn-block">Register</button>
        </form>
      </div>
    </div>
  </main>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>



