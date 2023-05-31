<?php
session_start();

// Connect to database
$db = mysqli_connect("localhost", "root", "", "mysite");

// Check if the form has been submitted
if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['author'])) {

    // Get form data
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $content = mysqli_real_escape_string($db, $_POST['content']);
    $author = mysqli_real_escape_string($db, $_POST['author']);

    // Get image data and save to /images directory
    $image = "";
    if(isset($_FILES['image'])) {
        $image_name = $_FILES['image']['name'];
        $image_temp = $_FILES['image']['tmp_name'];
        $image_folder = "images/";
        $image_path = $image_folder . $image_name;
        move_uploaded_file($image_temp, $image_path);
        $image = mysqli_real_escape_string($db, $image_path);
    }

    // Get image1 data and save to /images directory
    $image1 = "";
    if(isset($_FILES['image1'])) {
        $image1_name = $_FILES['image1']['name'];
        $image1_temp = $_FILES['image1']['tmp_name'];
        $image1_folder = "images/";
        $image1_path = $image1_folder . $image1_name;
        move_uploaded_file($image1_temp, $image1_path);
        $image1 = mysqli_real_escape_string($db, $image1_path);
    }

    // Get image2 data and save to /images directory
    $image2 = "";
    if(isset($_FILES['image2'])) {
        $image2_name = $_FILES['image2']['name'];
        $image2_temp = $_FILES['image2']['tmp_name'];
        $image2_folder = "images/";
        $image2_path = $image2_folder . $image2_name;
        move_uploaded_file($image2_temp, $image2_path);
        $image2 = mysqli_real_escape_string($db, $image2_path);
    }

    // Get image3 data and save to /images directory
    $image3 = "";
    if(isset($_FILES['image3'])) {
        $image3_name = $_FILES['image3']['name'];
        $image3_temp = $_FILES['image3']['tmp_name'];
        $image3_folder = "images/";
        $image3_path = $image3_folder . $image3_name;
        move_uploaded_file($image3_temp, $image3_path);
        $image3 = mysqli_real_escape_string($db, $image3_path);
    }

    // Insert post data into database
    $query = "INSERT INTO content (title, content, author, publish_date, image, image1, image2, image3) 
              VALUES ('$title', '$content', '$author', NOW(), '$image', '$image1', '$image2', '$image3')";
    mysqli_query($db, $query);

    // Redirect to homepage or display success message
    $_SESSION['message'] = "Post created successfully!";
    header("Location: content");
    exit();
}
?>