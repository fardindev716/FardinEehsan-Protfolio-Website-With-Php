<?php
include 'config/db.php';

if(isset($_POST['name'], $_POST['email'], $_POST['message'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $message = mysqli_real_escape_string($conn,$_POST['message']);

    $attachment = NULL;
    if(isset($_FILES['attachment']) && $_FILES['attachment']['name']!=""){
        $file_name = time().'_'.basename($_FILES['attachment']['name']);
        $file_tmp = $_FILES['attachment']['tmp_name'];
        if(!is_dir('uploads')){ mkdir('uploads',0777,true); }
        move_uploaded_file($file_tmp,'uploads/'.$file_name);
        $attachment = $file_name;
    }

    mysqli_query($conn,"INSERT INTO messages(name,email,message,attachment) VALUES('$name','$email','$message','$attachment')");
    echo "Message sent successfully!";
}
?>
