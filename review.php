<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style(1).css">
    <title>Movieland</title>
</head>
<body style="background-color:#111111">
    <div class="wrapper">
        <nav class="nav">
            <div class="nav-logo">
                <img src="uploads/images/movieland2 rev.png">
            </div>
            <div class="nav-menu" id="navMenu">
                <ul>
                    <li><a href="home.php" class="link">Home</a></li>
                    <li><a href="favorites.html" class="link">Favorites</a></li>
                    <li><a href="trending.html" class="link">Trending</a></li>
                    <li><a href="review.php" class="link active">Review</a></li>
                    <li><a href="community.html" class="link">Community</a></li>
                </ul>
            </div>
            <div class="nav-menu-btn">
                <i class="bx bx-menu" onclick="myMenuFunction()"></i>
            </div>
        </nav>

        <div class="container">
            <h2 class="white-text">Review & Comment</h2>
            <p class="white-text">Silahkan tinggalkan ulasan terhadap film yang telah anda tonton.</p>
            
            <!-- Daftar film yang akan datang -->
            <div class="movies-list" style="grid-template-columns: repeat(auto-fit, minmax(250px, 2fr));">
            <div class="movie" data-movie-id="siksakubur">
        <!-- Existing movie content here -->
        <h3>Siksa Kubur</h3>
        <!-- ... -->
        <form action="submit_review.php" method="POST" class="review-form">
        <img src="uploads/images/siksakuburr.jpg" alt="Siksa Kubur Movie Poster">
            <input type="hidden" name="movie_id" value="siksakubur">
            <label for="rating">Rating:</label>
            <select name="rating" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <label for="comment">Comment:</label>
            <textarea name="comment" rows="4" style="width:100%" required ></textarea>
            <button type="submit">Submit Review</button>
        </form>
        <div class="reviews">
            <h4>Reviews:</h4>
            <!-- Reviews will be dynamically inserted here by PHP -->
            <?php
            $conn = new mysqli("localhost", "root", "", "movieland");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $movie_id = "siksakubur";
            $sql = "SELECT rating, comment, created_at FROM reviews WHERE movie_id='$movie_id' ORDER BY created_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='review'>";
                    echo "<p><strong>Rating: " . $row['rating'] . "/5</strong></p>";
                    echo "<p>" . $row['comment'] . "</p>";
                    echo "<p><em>" . $row['created_at'] . "</em></p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No reviews yet. Be the first to review!</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>
    <div class="movie" data-movie-id="iparadalahmaut">
        <!-- Existing movie content here -->
        <h3>ipar adalah maut</h3>
        <!-- ... -->
        <form action="submit_review.php" method="POST" class="review-form">
        <img src="uploads/images/download (2).jpeg" alt="Ipar Adalah Maut Movie Poster">
            <input type="hidden" name="movie_id" value="iparadalahmaut">
            <label for="rating">Rating:</label>
            <select name="rating" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <label for="comment">Comment:</label>
            <textarea name="comment" rows="4" required style="width:100%"></textarea>
            <button type="submit">Submit Review</button>
        </form>
        <div class="reviews">
            <h4>Reviews:</h4>
            <!-- Reviews will be dynamically inserted here by PHP -->
            <?php
            $conn = new mysqli("localhost", "root", "", "movieland");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $movie_id = "iparadalahmaut";
            $sql = "SELECT rating, comment, created_at FROM reviews WHERE movie_id='$movie_id' ORDER BY created_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='review'>";
                    echo "<p><strong>Rating: " . $row['rating'] . "/5</strong></p>";
                    echo "<p>" . $row['comment'] . "</p>";
                    echo "<p><em>" . $row['created_at'] . "</em></p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No reviews yet. Be the first to review!</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>
    <div class="movie" data-movie-id="possesion">
        <!-- Existing movie content here -->
        <h3>Possession : Kerasukan</h3>
        <!-- ... -->
        <form action="submit_review.php" method="POST" class="review-form">
        <img src="uploads/images/download (1).jpeg" alt="Possession: Kerasukan Movie Poster">
            <input type="hidden" name="movie_id" value="possesion">
            <label for="rating">Rating:</label>
            <select name="rating" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <label for="comment">Comment:</label>
            <textarea name="comment" rows="4" required style="width:100%"></textarea>
            <button type="submit">Submit Review</button>
        </form>
        <div class="reviews">
            <h4>Reviews:</h4>
            <!-- Reviews will be dynamically inserted here by PHP -->
            <?php
            $conn = new mysqli("localhost", "root", "", "movieland");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $movie_id = "possesion";
            $sql = "SELECT rating, comment, created_at FROM reviews WHERE movie_id='$movie_id' ORDER BY created_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='review'>";
                    echo "<p><strong>Rating: " . $row['rating'] . "/5</strong></p>";
                    echo "<p>" . $row['comment'] . "</p>";
                    echo "<p><em>" . $row['created_at'] . "</em></p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No reviews yet. Be the first to review!</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>
    <div class="movie" data-movie-id="vinasebelum7hari">
        <!-- Existing movie content here -->
        <h3>Vina: Sebelum 7 Hari</h3>
        <!-- ... -->
        <form action="submit_review.php" method="POST" class="review-form">
        <img src="uploads/images/download.jpeg" alt="Vina: Sebelum 7 Hari Movie Poster">
            <input type="hidden" name="movie_id" value="vinasebelum7hari">
            <label for="rating">Rating:</label>
            <select name="rating" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <label for="comment">Comment:</label>
            <textarea name="comment" rows="4" style="width:100%" required></textarea>
            <button type="submit">Submit Review</button>
        </form>
        <div class="reviews">
            <h4>Reviews:</h4>
            <!-- Reviews will be dynamically inserted here by PHP -->
            <?php
            $conn = new mysqli("localhost", "root", "", "movieland");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $movie_id = "vinasebelum7hari";
            $sql = "SELECT rating, comment, created_at FROM reviews WHERE movie_id='$movie_id' ORDER BY created_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='review'>";
                    echo "<p><strong>Rating: " . $row['rating'] . "/5</strong></p>";
                    echo "<p>" . $row['comment'] . "</p>";
                    echo "<p><em>" . $row['created_at'] . "</em></p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No reviews yet. Be the first to review!</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>
               
                
                <!-- Tambahkan lebih banyak film yang akan datang di sini -->
            </div>
        </div>
        
    </body>
</html>
