<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movieland";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add'])) {
        // Add movie
        $title = $_POST['title'];
        $description = $_POST['description'];
        $trailer_link = $_POST['trailer_link'];

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        $sql = "INSERT INTO movies (title, description, image, trailer_link) VALUES ('$title', '$description', '$target_file', '$trailer_link')";
        $conn->query($sql);
    } elseif (isset($_POST['update'])) {
        // Update movie
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $trailer_link = $_POST['trailer_link'];

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        if ($_FILES["image"]["name"]) {
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            $sql = "UPDATE movies SET title='$title', description='$description', image='$target_file', trailer_link='$trailer_link' WHERE id=$id";
        } else {
            $sql = "UPDATE movies SET title='$title', description='$description', trailer_link='$trailer_link' WHERE id=$id";
        }

        $conn->query($sql);
    } elseif (isset($_POST['delete'])) {
        // Delete movie
        $id = $_POST['id'];
        $sql = "DELETE FROM movies WHERE id=$id";
        $conn->query($sql);
    }
}

// Fetch movies
$sql = "SELECT * FROM movies";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style(1).css">
    <title>Movie Management</title>
</head>
<body style="background-color:#303030">
<button style="position: left;"><a href="signup.php">Back</a></button>
<h2 style="text-align: center; color:black;">Welcome Back, Admin !</h2>
    <h2 style="text-align: center; color:black;">CRUD MOVIES</h2>

    <form action="movies.php" method="post" enctype="multipart/form-data">
        <div id="form-crud" style="text-align:center">
        <input type="hidden" name="id" id="movieId" >
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" style="width:500px" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="description" id="description" style="width:500px" required></textarea>
        <br>
        <label for="image">Image:</label>
        <input type="file" name="image" id="image">
        <br>
        <label for="trailer_link">Trailer Link:</label>
        <input type="text" name="trailer_link" id="trailer_link" style="width:500px" required>
        <br>
        <br>
        <button type="submit" name="add">Add Movie</button>
        <button type="submit" name="update">Update Movie</button>
        <button type="submit" name="delete">Delete Movie</button>
        </div>
    </form>
<br>
    <h2 style="text-align: center; color:black;">List Movie </h2>
    <ol style="text-align:center">
        <?php while($row = $result->fetch_assoc()): ?>
            <li>
                <img src="<?php echo $row['image']; ?>" width="100">
                <h3><?php echo $row['title']; ?></h3>
                <p><?php echo $row['description']; ?></p>
                <button><a href="<?php echo $row['trailer_link']; ?>" target="_blank">Watch Trailer</a></button>
                <button onclick="editMovie(<?php echo $row['id']; ?>, '<?php echo $row['title']; ?>', '<?php echo $row['description']; ?>', '<?php echo $row['trailer_link']; ?>')">Edit</button>
            </li>
        <?php endwhile; ?>
        <br>
    </ol>

    <script>
        function editMovie(id, title, description, trailer_link) {
            document.getElementById('movieId').value = id;
            document.getElementById('title').value = title;
            document.getElementById('description').value = description;
            document.getElementById('trailer_link').value = trailer_link;
        }
    </script>
</body>
</html>
