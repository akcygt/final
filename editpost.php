<!DOCTYPE html>
<html lang="en">
<head>
<?php
//connect to database
$db = mysqli_connect("localhost", "root", "", "mysite");

// check if post id is set
if(isset($_GET['edit'])){
    $id = $_GET['edit'];

    // retrieve post data from database
    $sql = "SELECT * FROM content WHERE contentid = $id";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);

    // check if form is submitted
    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author = $_POST['author'];

       // check if image files are uploaded
$image = $row['image'];
$image1 = $row['image1'];
$image2 = $row['image2'];
$image3 = $row['image3'];
if(!empty($_FILES['image']['name'])) {
    $image = 'images/' . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], $image);
}
if(!empty($_FILES['image1']['name'])) {
    $image1 = 'images/' . $_FILES['image1']['name'];
    move_uploaded_file($_FILES['image1']['tmp_name'], $image1);
}
if(!empty($_FILES['image2']['name'])) {
    $image2 = 'images/' . $_FILES['image2']['name'];
    move_uploaded_file($_FILES['image2']['tmp_name'], $image2);
}
if(!empty($_FILES['image3']['name'])) {
    $image3 = 'images/' . $_FILES['image3']['name'];
    move_uploaded_file($_FILES['image3']['tmp_name'], $image3);
}

// update post data in database
$sql = "UPDATE content SET title='$title', content='$content', author='$author', image='$image', image1='$image1', image2='$image2', image3='$image3' WHERE contentid=$id";
mysqli_query($db, $sql);

        // redirect back to content page
        header("Location: content.php");
        exit();
    }
}
else{
    // redirect to content page if post id is not set
    header("Location: content.php");
    exit();
}
?>
    <meta charset="UTF-8">
    <title>Edit Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        input[type="file"] {
    display: block;
    margin-bottom: 5px;
}

img {
    display: inline-block;
    margin-left: 10px;
    vertical-align: middle;
}
input[type="file"] {
    display: block;
    margin-bottom: 10px;
}

.img-container {
    display: inline-block;
    margin-left: 10px;
    vertical-align: middle;
    width: 100px;
    height: 100px;
    overflow: hidden;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.img-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}  
    </style>
</head>
<body>
    <h1>Edit Post</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" value="<?php echo $row['title']; ?>" required>
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea name="content" rows="10" required><?php echo $row['content']; ?></textarea>
        </div>
        <div>
            <label for="author">Author:</label>
            <input type="text" name="author" value="<?php echo $row['author']; ?>" required>
        </div>
        <div>
    <label for="image">Image:</label>
    <input type="file" name="image">
    <?php if(!empty($row['image'])): ?>
        <div class="img-container">
            <img src="<?php echo $row['image']; ?>">
        </div>
    <?php endif; ?>
</div>
<div>
    <label for="image1">Image1:</label>
    <input type="file" name="image1">
    <?php if(!empty($row['image1'])): ?>
        <div class="img-container">
            <img src="<?php echo $row['image1']; ?>">
        </div>
    <?php endif; ?>
</div>
<div>
    <label for="image2">Image2:</label>
    <input type="file" name="image2">
    <?php if(!empty($row['image2'])): ?>
        <div class="img-container">
            <img src="<?php echo $row['image2']; ?>">
        </div>
    <?php endif; ?>
</div>
<div>
    <label for="image3">Image3:</label>
    <input type="file" name="image3">
    <?php if(!empty($row['image3'])): ?>
        <div class="img-container">
            <img src="<?php echo $row['image3']; ?>">
        </div>
    <?php endif; ?>
</div>
        <div>
            <br><br>
            <input type="submit" name="submit" value="Update Post">
        </div>
    </form>
</body>
</html>