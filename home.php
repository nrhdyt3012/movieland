<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style(1).css">
    <title>Movieland</title>
    <style>
      .d-none {
        display: none;
      }
    </style>
</head>
<body style="background-color:#111111">
  <nav class="nav">
    <div class="nav-logo">
        <img src="uploads/images/movieland2 rev.png" alt="Movieland Logo">
    </div>
    <div class="nav-menu" id="navMenu">
        <ul>
            <li><a href="home.php" class="link active">Home</a></li>
            <li><a href="favorites.html" class="link">Favorites</a></li>
            <li><a href="trending.html" class="link">Trending</a></li>
            <li><a href="review.php" class="link">Review</a></li>
            <li><a href="community.html" class="link">Community</a></li>
            <li><a href="logout.php" class="link">LOG OUT</a></li>
        </ul>
    </div>
</nav>   
<div class="content">
    <div class="search-container">
      <input type="text" id="search" placeholder="Search" style="width: 1000px;">
      <button type="button" id="searchButton">Search</button>
    </div>
    <div class="haha">
    <h1  style="text-align:center; margin-top:200px; color: aliceblue;">REKOMENDASI FILM</h1>
  </div>
  <div class="movies-list" id="moviesList">
    <?php
    $conn = new mysqli("localhost", "root", "", "movieland");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM movies";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()):
    ?>
    <div class="movie" data-movie-id="<?php echo $row['id']; ?>" style="text-align: center;">
        <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?> Movie Poster">
        <h3><?php echo $row['title']; ?></h3>
        <p><?php echo $row['description']; ?></p>
        <form action="<?php echo $row['trailer_link']; ?>" method="GET" target="_blank">
            <button type="submit" class="play-button">Trailer</button>
        </form>
        <button class="favorite-button" onclick="toggleFavorite('<?php echo $row['id']; ?>', this)">&#9825; Add to Favorites</button>
    </div>
    <?php endwhile; ?>
  </div>
</div>
<script src="script.js"></script>
<script>
  function toggleFavorite(movieId) {
      let favorites = JSON.parse(localStorage.getItem('favorites')) || [];
      const index = favorites.indexOf(movieId);
      if (index === -1) {
          favorites.push(movieId);
          localStorage.setItem('favorites', JSON.stringify(favorites));
          alert('Added to favorites!');
      } else {
          favorites.splice(index, 1);
          localStorage.setItem('favorites', JSON.stringify(favorites));
          alert('Removed from favorites!');
      }
  }

  document.addEventListener('DOMContentLoaded', () => {
      const favorites = JSON.parse(localStorage.getItem('favorites')) || [];
      const buttons = document.querySelectorAll('.favorite-button');

      buttons.forEach(button => {
          const movieId = button.parentElement.getAttribute('data-movie-id');
          if (favorites.includes(movieId)) {
              button.innerHTML = '&#9829; Remove from Favorites';
          }
      });

      document.getElementById('searchButton').addEventListener('click', () => {
          const searchTerm = document.getElementById('search').value.toLowerCase();
          const movies = document.querySelectorAll('.movie');
          movies.forEach(movie => {
              const title = movie.querySelector('h3').innerText.toLowerCase();
              if (title.includes(searchTerm)) {
                  movie.style.display = 'block';
              } else {
                  movie.style.display = 'none';
              }
          });
      });
  });
</script>
</body>
</html>
