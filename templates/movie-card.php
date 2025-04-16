<?php

if (empty($movie->img)) {
  $movie->img = "movie_cover.jpg";
}

?>
<div class="card movie-card">
  <div class="card-img-top" style="background-image: url('<?= $BASE_URL ?>img/movies/<?= $movie->img ?>')"></div>
  <div class="card-body">
    <p class="card-rating">
      <i class="fas fa-star"></i>
      <span class="rating"><?= $movie->rating ?></span>
    </p>
    <a href="<?= $BASE_URL ?>movie.php?id=<?= $movie->id ?>" class="btn btn-primary rate-btn">Avaliar</a>
    <a href="<?= $BASE_URL ?>movie.php?id=<?= $movie->id ?>" class="btn btn-primary card-btn">Conhecer</a>
  </div>
</div>