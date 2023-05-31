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

// POST verilerini alın
$sliderID = $_POST["slider_id"];
$sliderTitle = $_POST["slider_title"];
$sliderRouter = $_POST["slider_router"];
$sliderDesc = $_POST["slider_desc"];

// Dosya yükleme işlemi
$targetDir = "images/slider/";
$targetFile = $targetDir . basename($_FILES["slider_image_file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Dosyayı hedef dizine taşı
if (!empty($_FILES["slider_image_file"]["tmp_name"])) {
    $check = getimagesize($_FILES["slider_image_file"]["tmp_name"]);
    if ($check !== false) {
        if (move_uploaded_file($_FILES["slider_image_file"]["tmp_name"], $targetFile)) {
            echo "Dosya başarıyla yüklendi.";
        } else {
            echo "Dosya yüklenirken bir hata oluştu.";
        }
    } else {
        echo "Dosya bir resim değil.";
    }
}

// MySQL sorgusu
$sql = "UPDATE slider SET
        slider_title = '$sliderTitle',
        slider_router = '$sliderRouter',
        slider_desc = '$sliderDesc',
        slider_image = '$targetFile'
        WHERE id = $sliderID";

if ($conn->query($sql) === true) {
    echo "Slider başarıyla güncellendi.";
} else {
    echo "Slider güncellenirken bir hata oluştu: " . $conn->error;
}

// MySQL bağlantısını kapatın
$conn->close();
?>
