// Select the buttons and show content elements in admin panel
const take1 = document.querySelector(".user-list-button");
const show1 = document.querySelector(".user-list");
const take2 = document.querySelector(".movie-list-button");
const show2 = document.querySelector(".movie-list");
const take3 = document.querySelector(".add-movie-button");
const show3 = document.querySelector(".add-movie");
const take4 = document.querySelector(".add-user-button");
const show4 = document.querySelector(".add-user");
const take5 = document.querySelector(".categories-button");
const show5 = document.querySelector(".categories");
const take6 = document.querySelector(".see-comment-button");
const show6 = document.querySelector(".comment-list");

// Add click event listener to button1
take1.addEventListener("click", () => {
    // Remove "active" class from previously clicked button (button7)
    show6.classList.remove("active");
    // Remove "active" class from previously clicked button (button6)
    show5.classList.remove("active");
    // Remove "active" class from previously clicked button (button5)
    show4.classList.remove("active");
    // Remove "active" class from previously clicked button (button3)
    show3.classList.remove("active");
    // Remove "active" class from previously clicked button (button2)
    show2.classList.remove("active");
    show1.classList.toggle("active");
});

// Add click event listener to button5
take4.addEventListener("click", () => {
    // Remove "active" class from previously clicked button (button7)
    show5.classList.remove("active");
    show4.classList.toggle("active");
    // Remove "active" class from previously clicked button (button3)
    show3.classList.remove("active");
    // Remove "active" class from previously clicked button (button2)
    show2.classList.remove("active");
});

// Add click event listener to button2
take2.addEventListener("click", () => {
    // Remove "active" class from previously clicked button (button7)
    show6.classList.remove("active");
    // Remove "active" class from previously clicked button (button6)
    show5.classList.remove("active");
    // Remove "active" class from previously clicked button (button5)
    show4.classList.remove("active");
    // Remove "active" class from previously clicked button (button3)
    show3.classList.remove("active");
    show2.classList.toggle("active");
    // Toggle "active" class on button1's content
    show1.classList.remove("active");
});
// Add click event listener to button3
take3.addEventListener("click", () => {
    // Remove "active" class from previously clicked button (button7)
    show6.classList.remove("active");
    // Remove "active" class from previously clicked button (button6)
    show5.classList.remove("active");
    // Remove "active" class from previously clicked button (button5)
    show4.classList.remove("active");
    show3.classList.toggle ("active");
    // Remove "active" class from previously clicked button (button1)
    show1.classList.remove("active");
});

// Add click event listener to button6
take5.addEventListener("click", () => {
    // Remove "active" class from previously clicked button (button7)
    show6.classList.remove("active");
    show5.classList.toggle("active");
    // Remove "active" class from previously clicked button (button5)
    show4.classList.remove("active");
    // Remove "active" class from previously clicked button (button2)
    show2.classList.remove("active");
    // Remove "active" class from previously clicked button (button1)
    show1.classList.remove("active");
});

// Add click event listener to button3
take6.addEventListener("click", () => {
    show6.classList.toggle("active");
    // Remove "active" class from previously clicked button (button6)
    show5.classList.remove("active");
    // Remove "active" class from previously clicked button (button5)
    show4.classList.remove("active");
    // Remove "active" class from previously clicked button (button3)
    show3.classList.remove("active");
    // Remove "active" class from previously clicked button (button2)
    show2.classList.remove("active");
    // Remove "active" class from previously clicked button (button1)
    show1.classList.remove("active");
});
