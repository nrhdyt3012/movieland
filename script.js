const filter = document.getElementById("search");
const items = document.querySelectorAll(".movies-list .movie");

filter.addEventListener("input", (e) => filterData(e.target.value));

function filterData(search) {
    items.forEach((item) => {
        if (item.innerText.toLowerCase().includes(search.toLowerCase())) {
            item.classList.remove("d-none");
        } else {
            item.classList.add("d-none");
        }
    });
}

function addToFavorites(movieId) {
    let favorites = JSON.parse(localStorage.getItem('favorites')) || [];
    if (!favorites.includes(movieId)) {
        favorites.push(movieId);
        localStorage.setItem('favorites', JSON.stringify(favorites));
        alert('Added to favorites!');
    } else {
        alert('This movie is already in your favorites.');
    }
}



function removeFromFavorites(movieId) {
    let favorites = JSON.parse(localStorage.getItem('favorites')) || [];
    const index = favorites.indexOf(movieId);
    if (index !== -1) {
        favorites.splice(index, 1);
        localStorage.setItem('favorites', JSON.stringify(favorites));
        location.reload(); // Reload to reflect changes
    }
}

