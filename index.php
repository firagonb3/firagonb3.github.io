<!DOCTYPE html>
<html lang="es">

<head>
  <?php include('recursos/php/host.php');?>
</head>

<body>
  <header>
    <!--Menu-->
    <?php require($uri . "/recursos/index/header.html") ?>
  </header>
  <main>
    <div class="container">
      <br>
      <?php 
        include('recursos/php/rss.php');
        include('recursos/php/carusel_rss.php')
      ?>
      <!--Carrusel-->
      <div class="row justify-content-md-center">
        <div id="carouselExampleIndicators" class="carousel slide carrousel-size carousel-transition-duration:1.5;" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <?php carusel("https://www.egames.news/rss/feed.xml", 5) ?>
            </div>
            <div class="carousel-item">
              <?php carusel("https://www.eurogamer.es/?format=rss&type=news", 4) ?>
            </div>
            <div class="carousel-item">
              <?php carusel("https://vandal.elespanol.com/xml.cgi", 2) ?>
            </div>
            <div class="carousel-item">
              <?php carusel("https://www.levelup.com/rss", 4) ?>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <!--Noticias-->

      <div id="div_Gral" class="row row-cols-1 row-cols-md-4 g-4">
        <?php
          //feed("https://pivigames.blog/feed/", 4);
          feed("https://www.levelup.com/rss", 4);
          feed("https://vandal.elespanol.com/xml.cgi", 2);
          feed("https://www.egames.news/rss/feed.xml", 5);
          feed("https://www.eurogamer.es/?format=rss&type=news", 4);
        ?>
      </div>
    </div>
    <div class="botoncito-container">
      <div class="botoncito">
        <button type="button" class="btn btn-outline-primary">
          <svg xmlns="http://www.w3.org/2000/svg" width="29" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-up"><polyline points="17 11 12 6 7 11"></polyline><polyline points="17 18 12 13 7 18"></polyline></svg>
        </button>
      </div>
    </div>
  </main>
  <footer>
    <?php require($uri . "/recursos/index/footer.html");?>
  </footer>
</body>

</html>