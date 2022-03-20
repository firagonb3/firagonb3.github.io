<!DOCTYPE html>
<html lang="es">

<head>
  <?php include('../../recursos/php/host.php');?>
</head>

<body>
  <header>
    <!--Menu-->
    <?php require($uri . "/recursos/index/header.html") ?>
  </header>
  <main>
    <br>
    <div class="container">
      <?php include('php/feed_PC.php')?>
      <!--Noticias-->

      <div id="div_Gral" class="row row-cols-1 row-cols-md-4 g-4">
        <?php 
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