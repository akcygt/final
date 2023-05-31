<!DOCTYPE html>
<html>
<head>
	<title>Edit Member</title>
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
</head>
<body>
<style>
	   .header {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 999;
}
h2{
	color:white;
}
</style>

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
	<br><br><br>
<div class="container">
	<h2>Edit Member</h2>
	<br><br><br>
	<form action="update.php" method="post">
		<?php
			// Connect to database
			$db = mysqli_connect("localhost","root","","mysite");

			// Retrieve member information
			$id = $_GET['id'];
			$sql = "SELECT * FROM users WHERE userid='$id'";
			$result = mysqli_query($db,$sql);
			$row = mysqli_fetch_assoc($result);

			if(isset($_POST['update_btn'])) {
				$username = mysqli_real_escape_string($db, $_POST['username']);
					$email = mysqli_real_escape_string($db, $_POST['email']);
					$user_type = mysqli_real_escape_string($db, $_POST['user_type']);
					
					// Map the user type value to admin_user value
					$admin_user = ($user_type == 'Admin') ? 1 : 0;
					
					// Update the user's information and admin_user value
					$update_sql = "UPDATE users SET username='$username', email='$email', admin_user='$admin_user' WHERE userid='$id'";
					mysqli_query($db, $update_sql);
					
					// Redirect to the desired page after the update
					header("location: adminpanel.php");
					exit();
				}
			?>
			<input type="hidden" name="id" value="<?php echo $row['userid']; ?>">
			<div class="form-group">
				<label for="username">Username:</label>
				<input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>">
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>">
			</div>
			<div class="form-group">
				<label for="user_type">User Type:</label>
				<select class="form-control" id="user_type" name="user_type">
					<option value="Kullanıcı" <?php if($row['admin_user'] == 0) echo 'selected'; ?>>Kullanıcı</option>
					<option value="Admin" <?php if($row['admin_user'] == 1) echo 'selected'; ?>>Admin</option>
				</select>
			</div>
			<button type="submit" name="update_btn" class="btn btn-primary">Update</button>
		</form>
	</div>

	</body>
	</html>