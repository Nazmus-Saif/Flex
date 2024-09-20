// to show the genres list
const genresButton2 = document.querySelector(".navbar-item2");
const moviesList2 = document.querySelector(".navbar-movies2");
// Flag to keep track of the visibility of the moviesList2
let isMoviesListVisible = false;
// Function to show the moviesList2
function showMoviesList() {
    moviesList2.style.display = "block";
    isMoviesListVisible = true;
}
// Function to hide the moviesList2
function hideMoviesList() {
    moviesList2.style.display = "none";
    isMoviesListVisible = false;
}
// Event listener to toggle the moviesList2 on button click
genresButton2.addEventListener("click", (event) => {
    event.stopPropagation(); // Prevent the click event from propagating to the document
    if (isMoviesListVisible) {
        hideMoviesList();
    } else {
        showMoviesList();
    }
});
// Event listener to hide the moviesList2 when clicking anywhere on the document
document.addEventListener("click", () => {
    if (isMoviesListVisible) {
        hideMoviesList();
    }
});
// Prevent the document click event from reaching the button
genresButton2.addEventListener("click", (event) => {
    event.stopPropagation();
});
// Event listener to prevent the moviesList2 from hiding when clicking inside it
moviesList2.addEventListener("click", (event) => {
    event.stopPropagation();
});