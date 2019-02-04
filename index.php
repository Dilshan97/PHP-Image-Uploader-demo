
<?php

    $errors = array();

    if (isset($_POST['submit'])) {
        
        // echo "<pre>";
        // print_r($_FILES);
        // echo "</pre>";

        $file_name = $_FILES['image']['name'];
        $file_type = $_FILES['image']['type'];
        $file_size = $_FILES['image']['size'];
        $temp_name = $_FILES['image']['tmp_name'];

        $upload_path = 'images/';

        $file_txt = substr($file_name,  0, strripos($file_name, '.')); // file name
        $file_ext = substr($file_name, strripos($file_name, '.')); // file extention

        $newfilename = md5($file_txt) . $file_ext;

        echo $newfilename;

        if ($file_type != 'image/jpeg') {
           $errors[] = 'Only JPEG files are allowed';
        }
        
        $file_upload = move_uploaded_file($temp_name, $upload_path . $newfilename);

       if ($file_upload) {
          echo "<script>alert('Image Uploaded');</script>";
       }

    }
    
    // $file_list = scandir('images/');
    // echo "<pre>";
    // print_r($file_list);
    // echo "</pre>";



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Image Upload</title>
</head>
<body>
    <div class="container">
        <h1>PHP Image Upload</h1>
        <h2>Please choose an Image then click Upload !</h2>

    	<form action="index.php" method="post" enctype="multipart/form-data">
            <input type="file" name="image">
            <button type="submit" name="submit">Upload</button>
        </form>

    </div>
</body>
</html>