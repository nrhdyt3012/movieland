# Movieland

Movieland is a web application for browsing, searching, and reviewing movies. It allows users to view recommended films, save favorites, watch trailers, and participate in a community through reviews and interactions. The application features both user and admin functionalities, including CRUD operations for managing the movie database.

## Features

- **Movie Browsing:** View a list of recommended films with posters, descriptions, and trailers.
- **Favorites:** Users can add or remove movies from their favorites, which are stored locally in their browser.
- **Search:** Quickly search for movies by title.
- **Reviews:** Submit and view reviews for each movie.
- **Community Page:** Interact with other users in a community setting.
- **Admin Panel:** Admins can add, update, or remove movies from the database.

## Screenshots

*(Add screenshots of the homepage, movie list, favorites, review form, and admin dashboard here.)*

## Installation

### Requirements

- PHP (Tested with PHP 7.x+)
- MySQL database
- Web server (e.g., Apache)

### Setup

1. **Clone the repository:**
   ```bash
   git clone https://github.com/nrhdyt3012/movieland.git
   cd movieland
   ```
2. **Database:**
   - Create a MySQL database named `movieland`.
   - Import the required tables for movies and reviews (see `movies.php` for the schema).
   - Update database credentials in PHP files if needed:
     ```php
     $conn = new mysqli("localhost", "root", "", "movieland");
     ```

3. **Uploads Folder:**
   - Ensure the `uploads/images/` directory exists and is writable for movie poster uploads.

4. **Run the Application:**
   - Place the project in your web server's root directory.
   - Access via `http://localhost/movieland/`.

## File Structure

- `home.php` / `ghome.php`: Main page for browsing and searching movies.
- `favorites.html`: View and manage favorite movies.
- `review.php`: Submit and view reviews for movies.
- `movies.php`: Admin page for CRUD operations on movies.
- `signup.php`, `adminlogin.php`, `login.php`: Authentication pages for users and admins.
- `community.html` / `gcommunity.html`: Community interaction pages.
- `uploads/images/`: Stores movie poster images.

## Usage

- **Regular Users:**
  - Browse movies, search by title, add favorites, and write/read reviews.
  - Register or log in to access all features.

- **Admins:**
  - Log in via `adminlogin.php`.
  - Use the admin dashboard to add, edit, or remove movies.

## Technologies Used

- PHP (Backend)
- MySQL (Database)
- HTML/CSS (Frontend)
- JavaScript (Client-side interactivity)
- Boxicons (Icon library)

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request for any features, bug fixes, or suggestions.

## License

This project is licensed under the MIT License.

---

*Made with ❤️ by nrhdyt3012*
