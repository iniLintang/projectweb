const hamburger = document.querySelector(".hamburger");
const navLinks = document.querySelector(".nav-links");

hamburger.addEventListener("click", () => {
    navLinks.classList.toggle("active");
});

document.querySelectorAll('.menu-item').forEach(function(item) {
    // Create pop-up element
    const popUp = document.createElement('div');
    popUp.className = 'pop-up';

    // Append pop-up to the item
    item.appendChild(popUp);

    // Show pop-up on hover
    item.addEventListener('mouseenter', function() {
        popUp.style.display = 'block'; // Show the pop-up
    });

    // Hide pop-up when not hovering
    item.addEventListener('mouseleave', function() {
        popUp.style.display = 'none'; // Hide the pop-up
    });
});
let currentIndex = 0;
const slideInterval = 3000; // 3 detik untuk interval otomatis
const slides = document.querySelectorAll('.slide');
const totalSlides = slides.length;

// Function to move to the next slide
function moveSlide(step) {
    currentIndex = (currentIndex + step + totalSlides) % totalSlides;
    const offset = -currentIndex * 100;
    document.querySelector('.slider').style.transform = `translateX(${offset}%)`;
}

// Function to start automatic sliding
function startAutoSlide() {
    return setInterval(() => moveSlide(1), slideInterval);
}

// Start auto-slide on page load
let autoSlideInterval = startAutoSlide();

// Restart auto-slide when user interacts with the slider
document.querySelector('.banner').addEventListener('mouseover', () => {
    clearInterval(autoSlideInterval);
});
document.querySelector('.banner').addEventListener('mouseout', () => {
    autoSlideInterval = startAutoSlide();
});

// Move slide on button click
function moveSlide(step) {
    clearInterval(autoSlideInterval); // Stop auto-slide when user interacts
    currentIndex = (currentIndex + step + totalSlides) % totalSlides;
    const offset = -currentIndex * 100;
    document.querySelector('.slider').style.transform = `translateX(${offset}%)`;
    autoSlideInterval = startAutoSlide(); // Restart auto-slide after interaction
}