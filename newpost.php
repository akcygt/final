<?php
session_start();

//connect to database
$db=mysqli_connect("localhost","root","","mysite");

// check if user is logged in, otherwise redirect to home page
if(!isset($_SESSION['username'])) {
    echo '<div style="text-align:center; background-color:red; color:white; padding:10px;">Bu sayfaya girmenize yetkiniz yok. 5 saniye içinde Anasayfaya dönlendirileceksiniz.</div>';
    header("refresh:5;url=index.php");
    exit();
}

// get the username from the adminuser table
$admin_username = $_SESSION['username'];
$sql = "SELECT * FROM adminuser WHERE username='$admin_username'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
$username = $_SESSION['username'];

// if the form is submitted
if(isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $content = mysqli_real_escape_string($db, $_POST['content']);
    
    // insert the post into the content table
    $sql = "INSERT INTO content (username, title, content) VALUES ('$username', '$title', '$content')";
    mysqli_query($db, $sql);
    
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>MySite - New Post</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h1 class="text-center">New Post</h1>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="form-group">
      <label for="content">Content:</label>
      <textarea class="form-control" id="content" name="content" rows="10" required></textarea>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>