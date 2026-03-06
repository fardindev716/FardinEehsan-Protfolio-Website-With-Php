
<style>

/* ===== RESET ===== */
*{
  margin:0;
  padding:0;
  box-sizing:border-box;
  font-family:Poppins, sans-serif;
}

/* ================= NAVBAR ================= */
.navbar{
  width:100%;
  background:#020617;
  padding:12px 6%;
  display:flex;
  justify-content:space-between;
  align-items:center;
  position:sticky;
  top:0;
  z-index:1000;
}

.logo img{
  height:70px;
}

.navbar ul{
  list-style:none;
  display:flex;
  gap:25px;
}

.navbar a{
  color:white;
  text-decoration:none;
  font-weight:500;
}

.navbar a:hover{
  color:#38bdf8;
}

/* ================= HERO ================= */
.hero{
  min-height:70vh;
  display:flex;
  align-items:center;
  justify-content:space-between;
  padding:60px 6%;
  background:#0f172a;
  color:white;
  gap:20px;
}

/* LEFT CONTENT */
.hero-left{
  flex:1;
}

.hero-left h1{
  font-size:48px;
  margin-bottom:15px;
}

.hero-left h3{
  font-size:22px;
  color:#38bdf8;
  margin-bottom:15px;
}

.hero-left p{
  line-height:1.6;
  margin-bottom:25px;
}

/* BUTTON */
.btn{
  background:#22c55e;
  padding:12px 30px;
  border-radius:8px;
  text-decoration:none;
  color:white;
}

/* RIGHT SLIDER */
.hero-right{
  flex:1;
  height:450px;
  position:relative;
  overflow:hidden;
  border-radius:16px;
}

/* SLIDES */
.slides img{
  position:absolute;
  width:100%;
  height:100%;
  object-fit:cover;
  opacity:0;
  transition:opacity 1s ease;
}

.slides img.active{
  opacity:1;
}

/* ================= MOBILE ================= */
@media(max-width:768px){

  .navbar ul{
    display:none;
  }

  .hero{
    flex-direction:column;
    text-align:center;
  }

  .hero-left h1{
    font-size:32px;
  }

  .hero-right{
    width:100%;
    height:300px;
  }
}



</style>


<!-- ========== NAVBAR ========== -->
<nav class="navbar">
  <a href="#hero" class="logo">
    <img src="uploads/<?= $logo ?>" alt="Logo">
  </a>

  <ul>
    <li><a href="#">Home</a></li>
    <li><a href="#about">About</a></li>
    <li><a href="#services">Services</a></li>
    <li><a href="#skills">Skills</a></li>
    <li><a href="#portfolio">Portfolio</a></li>
    <li><a href="#pricing">Pricing</a></li>
    <li><a href="#reviews">review</a></li>
    <li><a href="#blog">Blog</a></li>
    <li><a href="#contact">Contact</a></li>
  </ul>
</nav>


<!-- ========== HERO ========== -->
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