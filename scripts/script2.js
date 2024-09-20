// For opening side bar
const sidebar = document.querySelector(".side-bar");
const cross_sign = document.querySelector(".cross-mark"); // this is for cross button
const black_div = document.querySelector(".black"); // this is for black section not scroll
const sidebtn = document.querySelector(".header-bars"); // this is for all button

//for opening the side bar pressing all button
sidebtn.addEventListener("click", () => {
    sidebar.classList.add("active");
    cross_sign.style.display = "block"
    black_div.style.display = "block"
    document.body.style.overflow = "hidden"; // this is for lock the homepage scrolling when side bar is open
    
})
//for closing the side bar pressing cross button
cross_sign.addEventListener("click", () => {
    sidebar.classList.remove("active");
    cross_sign.style.display = "none"
    black_div.style.display = "none"
    document.body.style.overflow = "auto"; // this is for starting the homepage scrolling when side bar is closed
})
