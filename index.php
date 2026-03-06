<?php
include 'config/db.php';
// settings fetch
$setting = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM settings WHERE id=1"));

// Maintenance mode check
if($setting['live_mode'] == 0){
    header("Location: maintenance.php");
    exit;
}



// settings থেকে logo fetch করা
$setting = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM settings WHERE id=1"));
$logo = $setting['logo'] ?? 'default_logo.png'; // যদি logo empty থাকে
$favicon = $setting['site_favicon'] ?? 'default_favicon.png'; // যদি favicon empty থাকে


// Site Name + SEO Description
$site_name = $setting['site_name'] ?? 'My Website';
$seo_desc = $setting['seo_desc'] ?? 'Welcome to my website';


// Fetch hero content
$hero = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM hero LIMIT 1"));

// Fetch slides
$slides = mysqli_query($conn,"SELECT * FROM hero_slides ORDER BY id ASC");
$subtitles = $hero['subtitles']; // Rotating subtitles

// About
$about = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM about LIMIT 1"));

// Services
$services = mysqli_query($conn,"SELECT * FROM services");

// Skills
$skills = mysqli_query($conn,"SELECT * FROM skills");

// Portfolio
$portfolio = mysqli_query($conn,"SELECT * FROM portfolio WHERE active=1");


// Fetch all pricing plans
$pricing = mysqli_query($conn, "SELECT * FROM pricing ORDER BY id ASC");

// Counter
// $counter = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM counter LIMIT 1"));


// Review
// $reviews = mysqli_query($conn,"SELECT * FROM review");

// Blog
$blogs = mysqli_query($conn,"SELECT * FROM blog_posts");

// FAQ
$faqs = mysqli_query($conn,"SELECT * FROM faq");
?>


<!DOCTYPE html>
<html>
<head>
    <!-- Browser Tab Title = Site Name -->
      <title><?= htmlspecialchars($site_name) ?></title>
    <!-- Meta SEO -->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="<?= htmlspecialchars($seo_desc) ?>">
      <meta name="keywords" content="web developer, responsive website, portfolio, web application, freelance developer">
      <meta name="author" content="<?= htmlspecialchars($site_name) ?>">
      <!-- Open Graph (Facebook / Social Share SEO) -->
      <meta property="og:title" content="<?= htmlspecialchars($site_name) ?>">
      <meta property="og:description" content="<?= htmlspecialchars($seo_desc) ?>">
      <meta property="og:image" content="uploads/<?= $logo ?>">
      <meta property="og:type" content="website">
      <!-- Site Favicon -->
      <link rel="icon" href="uploads/<?= $favicon ?>" type="image/png">
    <style>
    body{font-family:Poppins; margin:0; background:#020617; color:white;}
    section{padding:80px 6%;}
    h2{margin-bottom:25px;}
    .grid{display:grid; gap:25px;}
    .card{background:rgba(255,255,255,.08); padding:25px; border-radius:18px; transition:.3s;}
    .card:hover{transform:translateY(-8px) scale(1.03); box-shadow:0 10px 35px rgba(0,0,0,.6);}
    .btn{padding:12px 25px; background:#22c55e; color:white; border-radius:40px; text-decoration:none; display:inline-block;}
    </style>

</head>
<body>



<!-- Header & Hero -->
<?php include 'header.php'; ?>
  
<!-- About -->
<section id="about" style="display:flex; gap:30px; align-items:center; flex-wrap:wrap; padding: 50px 130px 100px 130px;">
    <div style="flex:2; min-width:250px;">
        <img src="assets/images/<?= $about['image'] ?>" 
             style="width:100%; max-height:600px; border-radius:15px; object-fit:cover;">
    </div>
    <div style="flex:3; min-width:250px;">
        <h2>About Me</h2>
        <!-- Preserve line breaks and spacing -->
        <p style="white-space: pre-line; line-height:1.6;"><?= $about['bio'] ?></p>
        
        <p style="margin-top:25px;"><b>Experience:</b> <?= $about['experience'] ?></p>

        <!-- CV Download -->
        <a href="assets/files/<?= $about['resume'] ?>" 
           download="<?= $about['resume'] ?>" 
           style="margin-top:25px; display:inline-block; background:#22c55e; color:white; padding:10px 18px; border-radius:8px; text-decoration:none; font-weight:600;">
           Download CV
        </a>
    </div>
</section>


<!-- Services -->
<section id="services" style="padding: 50px 130px 100px 130px;background:#0f172a;color:white;">
<h2 style="text-align:center; margin-top:10px;margin-bottom:50px;">Services</h2>
<div class="grid" style="grid-template-columns:repeat(4,1fr)">
<?php while($s=mysqli_fetch_assoc($services)){ ?>
<div class="card" style="text-align:center;">
<h3><?= $s['title'] ?></h3>
<p><?= $s['description'] ?></p>
</div>
<?php } ?>
  </div>
</section>

<!-- Skills -->
<section id="skills">

<style>
#skills{
    text-align:center;
}

.skill-grid{
    display:flex;
    gap:40px;
    flex-wrap:wrap;
    justify-content:center;
}

.skill-card{
    width:150px;
}

.circle{
    position:relative;
    width:130px;
    height:130px;
}

.circle svg{
    transform:rotate(-90deg);
}

.circle circle{
    fill:none;
    stroke-width:10;
    stroke-linecap:round;
}

.bg{
    stroke:#1e293b;
}

.progress{
    transition:stroke-dashoffset 1.5s ease;
}

.skill-text{
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    font-size:14px;
}
</style>


<h2 id="skills" style="text-align:center; margin-top:-17px;margin-bottom:50px;">My Skills</h2>

<div class="skill-grid">

<?php while($sk=mysqli_fetch_assoc($skills)){

    $percent = (int)$sk['percent'];

   // 🎨 dynamic color
if($percent >= 90)      $color = "#22c55e";  // green
elseif($percent >= 80)  $color = "#06b6d4";  // cyan
elseif($percent >= 70)  $color = "#3b82f6";  // blue
elseif($percent >= 60)  $color = "#6366f1";  // indigo
elseif($percent >= 50)  $color = "#a855f7";  // purple
elseif($percent >= 40)  $color = "#f59e0b";  // orange
elseif($percent >= 30)  $color = "#f97316";  // deep orange
elseif($percent >= 20)  $color = "#ef4444";  // red
elseif($percent >= 10)  $color = "#dc2626";  // dark red
else                   $color = "#7f1d1d";  // maroon


    $radius = 45;
    $circumference = 2 * pi() * $radius;
    $offset = $circumference - ($percent / 100) * $circumference;
?>

<div class="skill-card">

    <div class="circle">

        <svg width="130" height="130">

            <!-- background -->
            <circle class="bg"
                cx="65" cy="65" r="<?= $radius ?>"
                stroke-dasharray="<?= $circumference ?>"
            />

            <!-- progress -->
            <circle class="progress"
                cx="65" cy="65" r="<?= $radius ?>"
                stroke="<?= $color ?>"
                stroke-dasharray="<?= $circumference ?>"
                stroke-dashoffset="<?= $offset ?>"
            />

        </svg>

        <div class="skill-text">
            <b><?= $sk['title'] ?></b><br>
            <?= $percent ?>%
        </div>

    </div>

</div>

<?php } ?>

</div>
</section>





 <!-- Portfolio -->
<section id="portfolio" style="padding:50px 130px;background:#0f172a;color:white;">
  <h2 style="text-align:center; margin-top:10px;margin-bottom:50px;">Portfolio</h2>
  
  <div class="grid" style="display:grid; grid-template-columns:repeat(3,1fr); gap:20px;">

    <?php while($p=mysqli_fetch_assoc($portfolio)){ ?>
    <div class="card" style="position:relative; height:300px; overflow:hidden; border-radius:12px;">
      <img src="assets/images/<?= $p['image'] ?>" style="width:100%; height:100%; object-fit:cover;">

      <div style="position:absolute; bottom:0; left:0; right:0; background:rgba(0,0,0,0.6); padding:15px; display:flex; flex-direction:column; gap:5px;">
        <h3 style="margin:0;"><?= $p['title'] ?></h3>
        <p style="margin:0; font-size:14px;"><?= $p['description'] ?></p>
        <div style="display:flex; gap:10px; margin-top:5px;">
          <a href="<?= $p['link'] ?>" target="_blank" class="btn" style="background:#22c55e; padding:6px 12px; border-radius:6px; text-decoration:none; color:white;">Browse</a>
          <button onclick="openModal('assets/images/<?= $p['image'] ?>','<?= addslashes($p['title']) ?>','<?= addslashes($p['description']) ?>','<?= $p['link'] ?>')"
                  class="btn" style="background:#38bdf8; padding:6px 12px; border-radius:6px; border:none; color:white; cursor:pointer;">View</button>
        </div>
      </div>
    </div>
    <?php } ?>

  </div>
</section>

<!-- Modal -->
<div id="portfolioModal" style="display:none; position:fixed; top:0; left:0; right:0; bottom:0; background:rgba(0,0,0,0.8); z-index:9999; justify-content:center; align-items:center; padding:30px;">
  <div style="background:#0f172a; border-radius:12px; max-width:700px; width:100%; position:relative; overflow:hidden;">
    <span onclick="closeModal()" style="position:absolute; top:10px; right:15px; cursor:pointer; font-size:24px; color:white;">&times;</span>
    <img id="modalImg" src="" style="width:100%; max-height:400px; object-fit:cover;">
    <div style="padding:20px;">
      <h3 id="modalTitle" style="margin-top:0; margin-bottom:10px;"></h3>
      <p id="modalDesc" style="margin-bottom:15px;"></p>
      <a id="modalLink" href="" target="_blank" style="background:#22c55e; padding:8px 16px; color:white; border-radius:6px; text-decoration:none;">Browse</a>
    </div>
  </div>
</div>

<script>
function openModal(img, title, desc, link){
  document.getElementById('modalImg').src = img;
  document.getElementById('modalTitle').innerText = title;
  document.getElementById('modalDesc').innerText = desc;
  document.getElementById('modalLink').href = link;
  document.getElementById('portfolioModal').style.display = 'flex';
}

function closeModal(){
  document.getElementById('portfolioModal').style.display = 'none';
}
</script>


<!-- ________Pricing--------- -->
<style>
.pricing-container{
  display:flex; 
  gap:30px; 
  flex-wrap:wrap; 
  justify-content:center;
}

.plan-card{
  background:#1e293b;
  padding:30px 25px;
  border-radius:16px;
  flex:1 1 380px;
  max-width:400px;
  box-shadow:0 8px 25px rgba(0,0,0,0.4);
  display:flex;
  flex-direction:column;
  align-items:center;
  transition:0.3s;
  min-height: auto; /* fixed height না দিয়ে content অনুযায়ী হোক */
}

.plan-card:hover{
  transform: translateY(-10px);
  box-shadow:0 15px 35px rgba(0,0,0,0.6);
}

.plan-icon{
  font-size:36px;
  margin-bottom:15px;
}

.plan-card h3{
  margin:10px 0 5px;
  font-size:26px;
  text-align:center;
}

.plan-price{
  font-size:22px;
  font-weight:bold;
  color:#22c55e;
  margin-bottom:5px;
}

.plan-discount{
  font-size:18px;
  color:#facc15;
  margin-bottom:20px;
}

/* Details flex-grow করে space নেবে */
.plan-card ul{
  list-style: disc;
  padding-left:20px;
  text-align:left;
  color:#cbd5e1;
  margin-bottom:30px;
  flex-grow:1; /* এখান থেকেই button সব সময় bottom এ থাকবে */
}

/* Button bottom aligned */
.buy-btn{
  background:#22c55e;
  color:white;
  padding:14px 35px;
  border:none;
  border-radius:8px;
  cursor:pointer;
  font-size:16px;
  transition:0.3s;
  text-decoration:none;
  align-self:center;
}

.buy-btn:hover{
  background:#16a34a;
  transform:scale(1.05);
}

/* Mobile responsive */
@media(max-width:900px){
  .plan-card{
    flex:1 1 90%;
    min-height:auto; /* mobile এ flexible height */
  }
}
</style>


<h1 id="pricing" style="padding:65px 130px;color:white;text-align:center;">Our Pricing Plans</h1>
<div class="pricing-container">
  <?php while($row = mysqli_fetch_assoc($pricing)){ ?>
  <div class="plan-card">
    <div class="plan-icon"><?= $row['icon'] ?></div>
    <h3><?= $row['plan'] ?></h3>
    <div class="plan-price">$<?= $row['price'] ?> <?php if($row['discount']) echo "(Discount: $".$row['discount'].")"; ?></div>

    <!-- Details as dot points -->
    <?php 
      $details = explode("\n", $row['details']); 
    ?>
    <ul>
      <?php foreach($details as $d){ if(trim($d)!="") echo "<li>".trim($d)."</li>"; } ?>
    </ul>

    <!-- Buy button -->
    <a href="#contact" class="buy-btn">Buy Now</a>
  </div>
  <?php } ?>
</div>







<!-- ================= REVIEW SECTION ================= -->
<section id="reviews" style="padding: 70px 130px;color:white;background:#0f172a; margin-top:100px; position:relative;">

  <!-- TITLE LINE -->
  <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:40px;">
    <h2 style="margin:0;font-size:28px;">
      Client Reviews 
      <span style="font-size:14px;color:#94a3b8;display:block;">
        What my clients say about my work
      </span>
    </h2>

    <button onclick="document.getElementById('formBox').style.display='block'"
      style="background:#22c55e;border:none;padding:10px 18px;border-radius:8px;color:white;font-weight:600;">
      + Add Review
    </button>
  </div>

  <!-- REVIEW FORM -->
  <div id="formBox"
    style="display:none;background:#020617;padding:25px;border-radius:12px;margin-bottom:40px;max-width:500px;">

    <form action="submit_review.php" method="POST" enctype="multipart/form-data">

      <input name="name" placeholder="Name" required
        style="width:100%;padding:10px;margin-bottom:12px;border-radius:6px;border:none;">

      <input name="country" placeholder="Country"
        style="width:100%;padding:10px;margin-bottom:12px;border-radius:6px;border:none;">

      <input type="file" name="image"
        style="width:100%;padding:10px;margin-bottom:12px;background:#111;border-radius:6px;">

      <select name="rating"
        style="width:100%;padding:10px;margin-bottom:12px;border-radius:6px;border:none;">
        <option value="5">★★★★★</option>
        <option value="4">★★★★</option>
        <option value="3">★★★</option>
        <option value="2">★★</option>
        <option value="1">★</option>
      </select>

      <textarea name="message" placeholder="Write your review"
        style="width:100%;padding:10px;border-radius:6px;border:none;margin-bottom:12px;"></textarea>

      <button name="send"
        style="background:#38bdf8;border:none;padding:10px 20px;border-radius:8px;color:white;">
        Submit Review
      </button>

    </form>
  </div>

  <!-- REVIEW SLIDER -->
  <div class="review-wrapper">
    <div class="review-row" id="reviewRow">
      <?php
      $r=mysqli_query($conn,"SELECT * FROM reviews WHERE status=1 ORDER BY id DESC");
      while($row=mysqli_fetch_assoc($r)){
      ?>
      <div class="review-card">

        <!-- TOP PROFILE -->
        <div class="review-profile">
          <img src="uploads/<?= $row['image']?>" alt="<?= $row['name']?>">
          <div>
            <div class="review-name">
              <?= $row['name'] ?>
              <?php if($row['verified']==1){ ?>
              <span style="color:#22c55e;font-size:14px;">✔</span>
              <?php } ?>
            </div>
            <div class="review-country"><?= $row['country'] ?></div>
          </div>
        </div>

        <!-- STAR -->
        <div class="review-star">
          <?php
          for($i=1;$i<=5;$i++){
            echo $i<=$row['rating'] ? "★" : "☆";
          }
          ?>
        </div>

        <!-- MESSAGE -->
        <p class="review-message"><?= $row['message'] ?></p>

      </div>
      <?php } ?>
    </div>
  </div>

</section>

<!-- ================= CSS ================= -->
<style>
/* Review Wrapper */
.review-wrapper {
  overflow-x: hidden; /* Hide scrollbar */
  scroll-behavior: smooth;
  width: 100%;
}

/* Review Row */
.review-row {
  display: flex;
  gap: 20px;
  flex-wrap: nowrap;
}

/* Review Card */
.review-card {
  flex: 0 0 25%;
  min-width: 260px;
  background:#1e293b;
  padding:20px;
  border-radius:12px;
  transition: transform 0.3s;
}
.review-card:hover {
  transform: translateY(-5px);
}

/* Profile */
.review-profile {
  display:flex;
  align-items:center;
  gap:15px;
  margin-bottom:10px;
}
.review-profile img {
  width:55px;
  height:55px;
  border-radius:50%;
  object-fit:cover;
}
.review-name {
  font-weight:600;
  display:flex;
  align-items:center;
  gap:6px;
}
.review-country {
  font-size:13px;
  color:#94a3b8;
}
.review-star {
  color:#facc15;
  margin-bottom:10px;
  font-size:15px;
}
.review-message {
  font-size:14px;
  line-height:1.5;
  color:#e2e8f0;
}

/* Hide scrollbar */
.review-wrapper::-webkit-scrollbar {
  display: none;
}
.review-wrapper {
  -ms-overflow-style: none;
  scrollbar-width: none;
}

/* Responsive */
@media(max-width:1024px) { .review-card { flex:0 0 33%; } }
@media(max-width:768px) { .review-card { flex:0 0 50%; } }
@media(max-width:480px) { .review-card { flex:0 0 80%; } }
</style>

<!-- ================= JS Auto Slide ================= -->
<script>
const reviewRow = document.getElementById('reviewRow');
let reviewScroll = 0;
const reviewStep = 1; // pixels per frame
const reviewSpeed = 10; // ms per frame

function autoSlideReview(){
  reviewScroll += reviewStep;
  if(reviewScroll > reviewRow.scrollWidth - reviewRow.clientWidth){
    reviewScroll = 0; // loop back
  }
  reviewRow.style.transform = `translateX(-${reviewScroll}px)`;
  requestAnimationFrame(autoSlideReview);
}
requestAnimationFrame(autoSlideReview);
</script>






<!-- Counter  -->
<section class="counter-section"style="padding: 50px 130px;color:white;">

<?php
$c=mysqli_query($conn,"SELECT * FROM counter WHERE status=1");
while($row=mysqli_fetch_assoc($c)){
?>

<div class="counter-card">

    <!-- LEFT ICON -->
    <div class="counter-icon">
        <?= $row['icon'] ?>
    </div>

    <!-- RIGHT CONTENT -->
    <div class="counter-info">
        <div class="counter-title">
            <?= $row['title'] ?>
        </div>

        <div
        class="counter-number"
        data-number="<?= $row['number'] ?>"
        data-suffix="<?= $row['suffix'] ?>">
        0
        </div>
    </div>

</div>

<?php } ?>

</section>


<!-- ================= CSS ================= -->
<style>

.counter-section{
    display:flex;
    flex-wrap:wrap;
    gap:25px;
    justify-content:center;
    padding:80px 20px;
    background:#;
}

/* Card */
.counter-card{
    width:260px;
   background:#020617;
  background:#0f172a;
    padding:22px;
    border-radius:14px;

    display:flex;
    align-items:center;
    gap:18px;

    color:white;
    transition:.3s;
}

.counter-card:hover{
    background:#1e293b;
    transform:translateY(-6px);
}

/* LEFT */
.counter-icon{
    font-size:34px;
    color:#22c55e;
    min-width:45px;
}

/* RIGHT */
.counter-info{
    display:flex;
    flex-direction:column;
}

/* Title top */
.counter-title{
    font-size:14px;
    color:#94a3b8;
    margin-bottom:6px;
}

/* Number bottom */
.counter-number{
    font-size:26px;
    font-weight:700;
    color:#ffffff;
}

/* Mobile */
@media(max-width:700px){
    .counter-card{
        width:100%;
    }
}

</style>




<!-- ================= JS COUNT ANIMATION ================= -->
<script>

const counters = document.querySelectorAll('.counter-number');

counters.forEach(counter => {

    const target = +counter.dataset.number;
    const suffix = counter.dataset.suffix || '';

    let count = 0;

    const update = () => {

        const inc = Math.ceil(target/80);

        if(count < target){
            count += inc;
            counter.innerText = count + suffix;
            setTimeout(update, 15);
        } else {
            counter.innerText = target + suffix;
        }
    };

    update();

});

</script>


<!-- ================= BLOG SECTION ================= -->
<section id="blog" class="blog-section" style="padding: 70px 130px;color:white;background:#0f172a;  position:relative;">
  <h2 style="text-align:center; margin-bottom:50px;">Latest Blog</h2>

  <!-- Arrows -->
  <button class="arrow left" onclick="slideLeft()">&#10094;</button>
  <button class="arrow right" onclick="slideRight()">&#10095;</button>

  <!-- Slider wrapper -->
  <div class="blog-wrapper">
    <div class="blog-row" id="blogRow">
      <?php while($b=mysqli_fetch_assoc($blogs)){ ?>
        <div class="blog-card">
          <img src="assets/images/<?= $b['image'] ?>" alt="<?= $b['title'] ?>">
          <div class="blog-content">
            <h3><?= $b['title'] ?></h3>
            <p><?= $b['excerpt'] ?></p>
            <a href="blog_single.php?id=<?= $b['id'] ?>" class="read-more-btn">Read More</a>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

<!-- ================= CSS ================= -->
<style>


/* Firefox scrollbar */
/* .blog-wrapper {
    scrollbar-width: thin;
    scrollbar-color: #22c55e #1e293b;
} */
.blog-wrapper{
    overflow:hidden;
    max-width:1300px;
    margin:auto;
}
/* Blog Row */
.blog-row {
    display: flex;
    gap: 25px;
    transition: transform 0.4s ease;
}


/* Blog Card */

.blog-card{
    width:calc((100% - 75px) / 4); /* 4 cards + 3 gaps */
    background:#1e293b;
    border-radius:12px;
    overflow:hidden;
    display:flex;
    flex-direction:column;
    height:350px;
    box-shadow:0 5px 20px rgba(0,0,0,0.4);
    flex-shrink:0;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.blog-card:hover {
    transform: translateY(-5px) scale(1.02);
    box-shadow: 0 10px 30px rgba(0,0,0,0.6);
}
.blog-card img {
    width:100%;
    height:180px;
    object-fit:cover;
}
.blog-content {
    padding:15px;
    flex:1;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
}
.blog-content h3 {
    margin:0 0 5px 0;
    font-size:18px;
    line-height:1.2;
}
.blog-content p {
    margin:0;
    font-size:13px;
    color:#cbd5e1;
    line-height:1.4;
    overflow:hidden;
    display:-webkit-box;
    -webkit-line-clamp:3;
    -webkit-box-orient:vertical;
}
.read-more-btn {
    margin-top:10px;
    background:#22c55e;
    border:none;
    padding:8px 12px;
    border-radius:6px;
    color:white;
    text-align:center;
    text-decoration:none;
    font-size:13px;
    display:inline-block;
    transition:0.3s;
}
.read-more-btn:hover {
    background:#16a34a;
}

/* ---------- Arrows ---------- */
.arrow{
    position:absolute;
    top:50%;
    transform:translateY(-50%);
    background:#22c55e;
    border:none;
    width:45px;
    height:45px;
    border-radius:50%;
    color:white;
    cursor:pointer;
    font-size:20px;
    z-index:10;
    transition:0.3s;
}
.arrow:hover {
    background:#16a34a;
}
.arrow.left{ left:10px; }
.arrow.right{ right:10px; }

/* Responsive */
/* @media(max-width:1024px){
    .blog-wrapper { padding:0 25px; }
}
@media(max-width:768px){
    .arrow{ width:35px; height:35px; font-size:16px; }
    .blog-card{ min-width:250px; }
}
@media(max-width:480px){
    .blog-card{ min-width:200px; height:320px; }
} */

@media(max-width:1024px){
    .blog-wrapper { padding:0 25px; }
}
@media(max-width:768px){
    .arrow{ width:35px; height:35px; font-size:16px; }
    .blog-card{ min-width:250px; }
}
@media(max-width:480px){
    .blog-card{ min-width:200px; height:320px; }
}

</style>

<!-- ================= JS ================= -->
<script>
let scrollPos = 0;
const blogRow = document.getElementById('blogRow');
const cardWidth = 325; // min-width + gap

function slideRight(){
    scrollPos += cardWidth;
    if(scrollPos > blogRow.scrollWidth - blogRow.clientWidth){
        scrollPos = blogRow.scrollWidth - blogRow.clientWidth;
    }
    blogRow.style.transform = `translateX(-${scrollPos}px)`;
}
function slideLeft(){
    scrollPos -= cardWidth;
    if(scrollPos < 0) scrollPos = 0;
    blogRow.style.transform = `translateX(-${scrollPos}px)`;
}
</script>



<!-- FAQ -->
<section id="faq"style="padding: 50px 130px;color:white;">
<h2 style="text-align:center; margin-top:5px;margin-bottom:50px;">FAQ</h2>
<?php while($f=mysqli_fetch_assoc($faqs)){ ?>
<details class="card" style="margin-bottom:10px; padding:15px;">
<summary><?= $f['question'] ?></summary>
<p><?= $f['answer'] ?></p>
</details>
<?php } ?>
</section>


<!-- Message -->
 <?php
include 'config/db.php';
$setting = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM settings WHERE id=1"));
$address = $setting['address'] ?? "Dhaka, Bangladesh"; 
$map_url = "https://maps.google.com/maps?q=".urlencode($address)."&t=&z=13&ie=UTF8&iwloc=&output=embed";
?>
<style>
#contact{padding:80px 6%; background:#020617;  color:white;}
.contact-container{ display:flex; gap:40px; flex-wrap:wrap; }
.contact-left{ flex:1; min-width:300px; }
.contact-left h2{ font-size:32px; margin-bottom:20px; }
.contact-form{ display:flex; flex-direction:column; gap:15px; }
.contact-form input,
.contact-form textarea{ padding:12px 15px; border-radius:12px; border:none; outline:none; font-size:16px; background:rgba(255,255,255,0.1); color:white; }
.contact-form textarea{ min-height:150px; resize:none; }
.contact-form input[type="file"]{ padding:5px; }
.contact-form .btn{ padding:14px 35px; background:linear-gradient(135deg,#38bdf8,#22c55e); color:white; border-radius:40px; border:none; cursor:pointer; transition:0.3s; }
.contact-form .btn:hover{ transform:scale(1.05); box-shadow:0 10px 25px rgba(0,0,0,0.5); }
.success-msg{color:#22c55e;font-weight:600;margin-bottom:15px;}
.contact-right{ flex:1; min-width:300px; height:400px; border-radius:12px; overflow:hidden; box-shadow:0 5px 25px rgba(0,0,0,0.5);}
.contact-right h2{ font-size:32px;  text-align:center; }
@media screen and (max-width:900px){ .contact-container{ flex-direction:column; } .contact-right{ height:300px; } }
iframe{border:0;}
</style>
</head>
<body>

<section id="contact" style="background:#0f172a;">
  <div class="contact-container">
    <div class="contact-left">
      <h2>Message Me</h2>
      <p id="success-msg" class="success-msg" style="display:none;"></p>
      <form id="contactForm" enctype="multipart/form-data" class="contact-form">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <textarea name="message" placeholder="Your Message" required></textarea>
        <input type="file" name="attachment" accept=".jpg,.png,.jpeg,.pdf,.doc,.docx,.xls,.xlsx">
        <button type="submit" class="btn">Send Message</button>
      </form>
    </div>
    <div class="contact-right" style="margin-top: 50px;">
      <h2>My Location</h2>
      <iframe 
        src="<?= $map_url ?>" 
        width="100%" height="100%" allowfullscreen="" loading="lazy">
      </iframe>
    </div>
  </div>
</section>

<script>
// AJAX Form Submission
document.getElementById('contactForm').addEventListener('submit', function(e){
    e.preventDefault(); // prevent default form submission

    let formData = new FormData(this);

    fetch('send_message.php', {
        method: 'POST',
        body: formData
    })
    .then(res => res.text())
    .then(data => {
        document.getElementById('success-msg').style.display = 'block';
        document.getElementById('success-msg').innerText = data;
        document.getElementById('contactForm').reset();
    })
    .catch(err => console.error(err));
});
</script>



<?php include 'footer.php'; ?>
</body>
</html>