<!DOCTYPE html>
<html>
<head>

  <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VBG7ED5SH7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-VBG7ED5SH7');
</script>
<title>Gallery</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<header>
<h1>Photo Gallery</h1>
</header>

<nav>
<a href="home.php">Home</a>
<a href="gallery.php">Gallery</a>
<a href="children.php">Children</a>
<a href="about.php">About</a>
<a href="services.php">Services</a>
<a href="contact.php">Contact</a>
</nav>

<section class="gallery">

<img src="https://picsum.photos/300?1" onclick="showImage(this)">
<img src="https://picsum.photos/300?2" onclick="showImage(this)">
<img src="https://picsum.photos/300?3" onclick="showImage(this)">
<img src="https://picsum.photos/300?4" onclick="showImage(this)">

</section>

<div id="popup">
<img id="popup-img">
</div>

<script src="script.js"></script>

</body>
</html>
