<?php
include 'config/db.php';

// Fetch hero content
$hero = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM hero LIMIT 1"));

// Fetch slides
$slides = mysqli_query($conn,"SELECT * FROM hero_slides ORDER BY id ASC");
$subtitles = $hero['subtitles']; // Rotating subtitles
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Portfolio</title>
<style>
body{margin:0;font-family:Poppins,sans-serif;}
.hero{display:flex;align-items:center;justify-content:space-between;padding:60px 6%;min-height:100vh;background:#0f172a;color:white;gap:40px;}
.hero-left{flex:1;}
.hero-left h1{font-size:48px;margin-bottom:15px;}
.hero-left h3{font-size:24px;color:#38bdf8;margin-bottom:15px;}
.hero-left p{margin-bottom:25px;line-height:1.6;}
.btn{display:inline-block;padding:12px 28px;background:#22c55e;border-radius:8px;text-decoration:none;color:white;}
.hero-right{flex:1;position:relative;height:450px;overflow:hidden;border-radius:16px;}
.slides img{position:absolute;width:100%;height:100%;object-fit:cover;opacity:0;transition:opacity 1s ease-in-out;}
.slides img.active{opacity:1;}
@media(max-width:768px){.hero{flex-direction:column;text-align:center;}.hero-left h1{font-size:32px;}.hero-right{width:100%;height:300px;}}
</style>
</head>
<body>

<section id="hero" class="hero">
  <!-- LEFT CONTENT -->
  <div class="hero-left">
    <h1><?= $hero['title'] ?></h1>
    <h3 id="hero-subtitle"></h3>
    <p><?= $hero['description'] ?></p>
    <a href="#contact" class="btn">Hire Me</a>
  </div>

  <!-- RIGHT SLIDER -->
  <div class="hero-right">
    <div class="slides">
      <?php
      $first = true;
      while($row = mysqli_fetch_assoc($slides)){
      ?>
      <img src="uploads/<?= $row['image'] ?>" class="<?= $first ? 'active' : '' ?>">
      <?php
      $first = false;
      }
      ?>
    </div>
  </div>
</section>

<script>
// Rotating subtitles
let subtitleArr = "<?= $subtitles ?>".split(",");
let index = 0;
let subtitleEl = document.getElementById("hero-subtitle");

function showNextSubtitle(){
    subtitleEl.textContent = subtitleArr[index];
    index = (index + 1) % subtitleArr.length;
}
showNextSubtitle();
setInterval(showNextSubtitle,2000);

// Slider images
let slides = document.querySelectorAll(".slides img");
let i = 0;
setInterval(() => {
  slides[i].classList.remove("active");
  i = (i+1)%slides.length;
  slides[i].classList.add("active");
},3000);
</script>

</body>
</html>
