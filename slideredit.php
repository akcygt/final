<!DOCTYPE html>
<html>
<head>
    <title>Slider Düzenle</title>
</head>
<body>
    <h1>Slider Düzenle</h1>

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

    // Düzenlenecek sliderin ID'sini alın
    $sliderID = $_GET["id"]; // slideredit.php?id=1 gibi bir URL'den ID'yi alır

    // MySQL sorgusu
    $sql = "SELECT * FROM slider WHERE id = $sliderID";

    // Sorguyu çalıştır ve sonucu al
    $result = $conn->query($sql);

    // Sonucu kontrol et
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $sliderImage = $row["slider_image"];
        $sliderTitle = $row["slider_title"];
        $sliderRouter = $row["slider_router"];
        $sliderDesc = $row["slider_desc"];
        ?>

        <form method="POST" action="update_slider.php" enctype="multipart/form-data">
            <input type="hidden" name="slider_id" value="<?php echo $sliderID; ?>">

            <label for="slider_image">Slider Resmi:</label>
            <?php if (!empty($sliderImage)): ?>
                <img src="<?php echo $sliderImage; ?>" alt="Slider Resmi" width="200">
            <?php endif; ?>
            <input type="file" name="slider_image_file"><br><br>

            <label for="slider_title">Slider Başlığı:</label>
            <input type="text" name="slider_title" value="<?php echo $sliderTitle; ?>"><br><br>

            <label for="slider_router">Slider Yönlendirme:</label>
            <input type="text" name="slider_router" value="<?php echo $sliderRouter; ?>"><br><br>

            <label for="slider_desc">Slider Açıklama:</label>
            <textarea name="slider_desc"><?php echo $sliderDesc; ?></textarea><br><br>

            <input type="submit" value="Kaydet">
        </form>

        <?php
    } else {
        echo "Slider bulunamadı.";
    }

    // MySQL bağlantısını kapatın
    $conn->close();
    ?>
</body>
</html>