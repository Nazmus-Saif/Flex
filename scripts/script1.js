// JavaScript for Image Slider
var counter = 1;
var isHovered = false; // Initialize hover state

// Function to change the checked radio button when a button is clicked
function changeSlide(slideNumber) {
    document.getElementById("radio" + slideNumber).checked = true;
    counter = slideNumber;
}

// Interval for automatic sliding
var slideInterval = setInterval(function () {
    if (!isHovered) { // Check if not hovered
        counter++;
        if (counter > 5) {
            counter = 1;
        }
        changeSlide(counter);
    }
}, 5000);

// Add click event listeners to the navigation buttons
document.getElementById("btn1").addEventListener("click", function () {
    changeSlide(1);
});
document.getElementById("btn2").addEventListener("click", function () {
    changeSlide(2);
});
document.getElementById("btn3").addEventListener("click", function () {
    changeSlide(3);
});
document.getElementById("btn4").addEventListener("click", function () {
    changeSlide(4);
});
document.getElementById("btn5").addEventListener("click", function () {
    changeSlide(5);
});

// Add hover event listeners to pause and resume the slider
document.getElementById("slider-container").addEventListener("mouseenter", function () {
    isHovered = true;
    clearInterval(slideInterval); // Pause the slider
});

document.getElementById("slider-container").addEventListener("mouseleave", function () {
    isHovered = false;
    // Resume the slider after a delay
    setTimeout(function () {
        slideInterval = setInterval(function () {
            if (!isHovered) {
                counter++;
                if (counter > 5) {
                    counter = 1;
                }
                changeSlide(counter);
            }
        }, 5000);
    });
});



// automatic top scroll button
const topButton = document.querySelector(".top-arrow");

// Function to toggle the visibility of the top button based on scroll position
function toggleTopButtonVisibility() {
    if (document.documentElement.scrollTop > 120) {
        topButton.style.display = "block";
    } else {
        topButton.style.display = "none";
    }
}

// Add a scroll event listener to call the toggleTopButtonVisibility function
document.addEventListener("scroll", toggleTopButtonVisibility);

// Add a click event listener to scroll to the top smoothly when the button is clicked
topButton.addEventListener("click", () => {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
});

// Initial check for visibility when the page loads
toggleTopButtonVisibility();




// Function to handle scrolling for a genre section
function handleGenreSectionScroll(genreSection) {
    let scrollPosition = 0; // This will keep track of the current scroll position within the genre section

    const movieWidth = 230 + 18; // Width of a single movie item, adjust as needed + 18 for gap between the movie img as margin for movie gap is 9 so for both side 9*2=18

    const leftButton = genreSection.querySelector(".left-button");
    const rightButton = genreSection.querySelector(".right-button");

    rightButton.addEventListener("click", () => {
        scrollPosition += movieWidth;
        const maxScroll = genreSection.scrollWidth - genreSection.clientWidth + 18; // + 18 for gap between the movie img as margin for movie gap is 9 so for both side 9*2=18
        // scrollWidth -> This is a property of the genreSection DOM element. It represents the total width of the content within the genreSection
        // clientWidth -> This is another property of the genreSection DOM element. It represents the visible width of the genreSection
        // maxScroll -> subtracts the visible width from the total width (This subtraction results in the width of the content that is not currently visible in the viewport, essentially the amount of content that you can scroll to see.)
        // maxScroll -> represents how much you can scroll horizontally to view content that is currently hidden off-screen.
        if (scrollPosition > maxScroll) {
            scrollPosition = 0;
        }

        genreSection.scrollTo({
            left: scrollPosition,
            behavior: "smooth",
        });
    });

    leftButton.addEventListener("click", () => {
        scrollPosition -= movieWidth;
        const maxScroll = genreSection.scrollWidth - genreSection.clientWidth + 18; // + 18 for gap between the movie img as margin for movie gap is 9 so for both side 9*2=18

        if (scrollPosition < 0) {
            scrollPosition = maxScroll;
        }

        genreSection.scrollTo({
            left: scrollPosition,
            behavior: "smooth",
        });
    });
}


/* i have write button function and call it for each genre 
if i call it only one time for genre-section then if i click one button in a genre 
then the button active for all others genre also which is not ok */
// Apply the functionality to each genre section
const recentSection = document.querySelector(".genre-section.recent");
const actionSection = document.querySelector(".genre-section.action");
const comedySection = document.querySelector(".genre-section.comedy");
const horrorSection = document.querySelector(".genre-section.horror");
const sciFiSection = document.querySelector(".genre-section.sci-fi");

if (recentSection) {
    handleGenreSectionScroll(recentSection);
}
if (actionSection) {
    handleGenreSectionScroll(actionSection);
}
if (comedySection) {
    handleGenreSectionScroll(comedySection);
}
if (horrorSection) {
    handleGenreSectionScroll(horrorSection);
}
if (sciFiSection) {
    handleGenreSectionScroll(sciFiSection);
}