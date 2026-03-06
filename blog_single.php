<?php
include 'config/db.php';
$id = intval($_GET['id']);
$post = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM blog_posts WHERE id=$id"));
?>

<!DOCTYPE html>
<html>
<head>
<title><?= htmlspecialchars($post['title']) ?> - My Blog</title>
<style>
body {
    font-family: 'Poppins', sans-serif;
    margin:0;
    padding:0;
    background:#0f172a;
    color:white;
}
.container {
    max-width:900px;
    margin:60px auto;
    padding:20px;
}
.blog-title {
    font-size:36px;
    font-weight:700;
    margin-bottom:20px;
    text-align:center;
    color:#38bdf8;
}
.blog-image {
    width:100%;
    max-height:450px;
    object-fit:cover;
    border-radius:12px;
    box-shadow:0 10px 30px rgba(0,0,0,0.5);
    margin-bottom:30px;
}
.blog-content {
    font-size:17px;
    line-height:1.8;
    color:#e2e8f0;
}
.blog-content p {
    margin-bottom:15px;
}
.back-btn {
    display:inline-block;
    margin-top:30px;
    padding:10px 25px;
    background:#22c55e;
    color:white;
    text-decoration:none;
    border-radius:8px;
    font-weight:500;
    transition:0.3s;
}
.back-btn:hover {
    background:#16a34a;
    transform:scale(1.05);
}
@media(max-width:768px){
    .blog-title { font-size:28px; }
    .blog-content { font-size:15px; }
}
</style>
</head>
<body>

<div class="container">
    <h1 class="blog-title"><?= htmlspecialchars($post['title']) ?></h1>
    <?php if(!empty($post['image'])): ?>
    <img src="assets/images/<?= $post['image'] ?>" class="blog-image">
    <?php endif; ?>
    <div class="blog-content">
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </div>
    <a href="index.php" class="back-btn">← Back</a>
</div>

</body>
</html>
