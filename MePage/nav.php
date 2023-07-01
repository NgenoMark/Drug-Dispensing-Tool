<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<nav>
  <a href="#" onclick="scrollToSection('home')">Home</a>
  <a href="#" onclick="scrollToSection('about')">About</a>
  <a href="#" onclick="scrollToSection('contact')">Contact</a>
</nav>

<section id="home">
  <!-- Home section content -->
</section>

<section id="about">
  <!-- About section content -->
</section>

<section id="contact">
  <!-- Contact section content -->
</section>

<script>
  function scrollToSection(sectionId) {
    const section = document.getElementById(sectionId);
    section.scrollIntoView({ behavior: 'smooth' });
  }
</script>

    
</body>
</html>