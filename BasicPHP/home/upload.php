<?php
    $uploaddir = '../uploads/';
    $allowed =  array('gif','png' ,'jpg','csv','JPG');
    $filename = $_FILES['file']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(!in_array($ext,$allowed) ) {
        echo 'File Must be .jpg,.gif,.png,.csv type only';
    }
    else{
        $uploadfile = "";
        if (strpos($filename, '.csv') !== false) {
            $myFile = "../uploads/data.csv";
            unlink($myFile);
            $uploadfile = $uploaddir . "data.csv";
        }
        else{
            $myFile = "../uploads/profile.jpg";
            unlink($myFile);
            $uploadfile = $uploaddir . "profile.jpg";
        }
        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
            echo "Upload Complete.\n";
        } else {
            echo "Possible file upload attack!\n";
        }
    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="home.php">Back to Home</a>
</body>
</html>