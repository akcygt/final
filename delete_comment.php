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

// Silinecek yorumun ID'sini al
$commentID = $_GET['id'];

// Oturum açmış kullanıcının adını al
$username = $_SESSION['username'];

// Yorumun sahibini ve kullanıcının admin yetkisini kontrol et
$checkOwnerSql = "SELECT * FROM comments WHERE id = $commentID";
$checkOwnerResult = $conn->query($checkOwnerSql);

if ($checkOwnerResult->num_rows > 0) {
    $row = $checkOwnerResult->fetch_assoc();
    $commentOwner = $row['username'];

    // Admin yetkisi kontrolü
    $checkAdminSql = "SELECT admin_user FROM users WHERE username = '$username' AND admin_user = 1";
    $checkAdminResult = $conn->query($checkAdminSql);

    if ($commentOwner === $username || $checkAdminResult->num_rows > 0) {
        // Yorumun bağlı olduğu içeriğin ID'sini al
        $contentIDSql = "SELECT contentid FROM comments WHERE id = $commentID";
        $contentIDResult = $conn->query($contentIDSql);

        if ($contentIDResult->num_rows > 0) {
            $row = $contentIDResult->fetch_assoc();
            $contentID = $row['contentid'];

            // Yorumu sil
            $deleteSql = "DELETE FROM comments WHERE id = $commentID";

            if ($conn->query($deleteSql) === TRUE) {
                // Silme işlemi tamamlandıktan sonra geri yönlendirme yap
                header("Location: contents.php?id=$contentID");
                exit();
            } else {
                echo "<script>alert('Yorum silinirken bir hata oluştu.');</script>";
            }
        } else {
            echo "<script>alert('Yorumun bağlı olduğu içerik bulunamadı.');</script>";
        }
    } else {
        echo "<script>alert('Yalnızca kendi yorumlarınızı veya tüm yorumları silebilirsiniz.');</script>";
    }
} else {
    echo "<script>alert('Yorum bulunamadı.');</script>";
}

// Ana sayfaya yönlendir
header("Location: index.php");
exit();

// MySQL bağlantısını kapatın
$conn->close();
?>