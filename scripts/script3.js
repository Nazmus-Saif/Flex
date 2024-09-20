// to show the genres list
const genresButton1 = document.querySelector(".navbar-item2");
const moviesList1 = document.querySelector(".navbar-movies");
// Flag to keep track of the visibility of the moviesList1
let isMoviesListVisible = false;
// Function to show the moviesList1
function showMoviesList() {
    moviesList1.style.display = "block";
    isMoviesListVisible = true;
}
// Function to hide the moviesList1
function hideMoviesList() {
    moviesList1.style.display = "none";
    isMoviesListVisible = false;
}
// Event listener to toggle the moviesList1 on button click
genresButton1.addEventListener("click", (event) => {
    event.stopPropagation(); // Prevent the click event from propagating to the document
    if (isMoviesListVisible) {
        hideMoviesList();
    } else {
        showMoviesList();
    }
});
// Event listener to hide the moviesList1 when clicking anywhere on the document
document.addEventListener("click", () => {
    if (isMoviesListVisible) {
        hideMoviesList();
    }
});
// Prevent the document click event from reaching the button
genresButton1.addEventListener("click", (event) => {
    event.stopPropagation();
});
// Event listener to prevent the moviesList1 from hiding when clicking inside it
moviesList1.addEventListener("click", (event) => {
    event.stopPropagation();
});