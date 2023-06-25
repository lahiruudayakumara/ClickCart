
//Reference - W3School

const slider = document.querySelector('.slider');
const sliderItems = Array.from(document.querySelectorAll('.slider-item'));
const sliderButtonsContainer = document.querySelector('.slider-buttons');
let currentSlide = 0;

// Create slider buttons
sliderItems.forEach((_, index) => {
  const button = document.createElement('div');
  button.classList.add('slider-button');
  if (index === currentSlide) {
    button.classList.add('active');
  }
  button.addEventListener('click', () => {
    goToSlide(index);
  });
  sliderButtonsContainer.appendChild(button);
});

// Auto slide every 3 seconds
setInterval(() => {
  goToSlide((currentSlide + 1) % sliderItems.length);
}, 3000);

// Go to specific slide
function goToSlide(index) {
  slider.style.transform = `translateX(-${index * 100}%)`;
  sliderButtonsContainer.querySelector('.active').classList.remove('active');
  sliderButtonsContainer.children[index].classList.add('active');
  currentSlide = index;
}