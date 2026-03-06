<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit;
}
include '../config/db.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<link rel="stylesheet" href="../assets/css/admin_style.css">
</head>
<body>
<div class="sidebar">
<h2>Admin Panel</h2>
<ul>
<li><a href="dashboard.php">Dashboard</a></li>
<li><a href="hero.php">Hero Section</a></li>
<li><a href="about.php">About Section</a></li>
<li><a href="services.php">Manage Services</a></li>
<li><a href="skills.php">Manage Skills</a></li>
<li><a href="portfolio.php">Manage Portfolio</a></li>
<li><a href="pricing.php">Manage Pricing</a></li>
<li><a href="counter.php">Manage Counter</a></li>
<li><a href="reviews.php">Manage Reviews</a></li>
<li><a href="blog.php">Manage Manage Blog</a></li>
<li><a href="faq.php">Manage FAQ</a></li>
<li><a href="messages.php">Contact Info</a></li>

<li><a href="media.php">Media</a></li>
<li><a href="setting.php">Setting</a></li>
<li><a href="admin_profile.php">Admin Profile</a></li>

<li><a href="logout.php">Logout</a></li>

</ul>
</div>
<div class="main-content">
<h1>Welcome, <?= $_SESSION['admin'] ?></h1>
<p>Use the sidebar to manage your portfolio website.</p>

</div>
</body>
</html>