<?php
include "config/db.php";

if(isset($_POST['send'])){

$name=$_POST['name'];
$country=$_POST['country'];
$rating=$_POST['rating'];
$message=$_POST['message'];

$image="";

/* IMAGE UPLOAD */
if(!empty($_FILES['image']['name'])){

    $img_name = time().'_'.$_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp,"uploads/".$img_name);

    $image=$img_name;
}

mysqli_query($conn,"
INSERT INTO reviews(name,country,rating,message,image,status)
VALUES('$name','$country','$rating','$message','$image',0)
");

header("Location:index.php");
exit;
}
?>
