let slideIndex = 0;
let slideInterval = setInterval(showNextSlide, 3000);

function showNextSlide() {
  const slides = document.querySelectorAll('.slideShow__list-item');
  slideIndex = (slideIndex + 1) % slides.length;
  updateSlidePosition();
}

function updateSlidePosition() {
  const slides = document.querySelector('.slideShow__list');
  slides.style.transform = `translateX(${-slideIndex * 100}%)`;
}

function prevSlide() {
  clearInterval(slideInterval);
  slideInterval = setInterval(showNextSlide, 7000);
  const slides = document.querySelectorAll('.slideShow__list-item');
  slideIndex = (slideIndex - 1 + slides.length) % slides.length;
  updateSlidePosition();
}

function nextSlide() {
  clearInterval(slideInterval);
  slideInterval = setInterval(showNextSlide, 7000);
  showNextSlide();
}

document.addEventListener('DOMContentLoaded', () => {
  updateSlidePosition();
});
