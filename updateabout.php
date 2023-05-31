<?php
session_start();

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
    // Formdan gönderilen verileri alın
    $title = $_POST['title'];
    $author = $_POST['author'];
    $time = $_POST['time'];
    $content = $_POST['content'];

    // About bilgilerini güncelle
    $updateSql = "UPDATE about SET title = '$title', author = '$author', time = '$time', content = '$content'";

    if ($conn->query($updateSql) === TRUE) {
        header("Location: adminpanel.php");
    } else {
        echo "About bilgisi güncellenirken bir hata oluştu: " . $conn->error;
    }
} else {
    echo "Bu sayfayı güncellemek için admin yetkisine sahip olmanız gerekmektedir.";
}

// MySQL bağlantısını kapatın
$conn->close();
?>
