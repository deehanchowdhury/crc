document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.querySelector('.menu-toggle');
    const navList = document.querySelector('.nav-list');

    toggle.addEventListener('click', () => {
        navList.classList.toggle('show');
    });
});
document.addEventListener('DOMContentLoaded', () => {
    const slides = document.querySelectorAll('.slide');
    const prevBtn = document.querySelector('.prev');
    const nextBtn = document.querySelector('.next');
    let currentIndex = 0;
  
    function showSlide(index) {
      slides.forEach((slide, i) => {
        slide.style.display = i === index ? 'block' : 'none';
      });
    }
  
    function showNext() {
      currentIndex = (currentIndex + 1) % slides.length;
      showSlide(currentIndex);
    }
  
    function showPrev() {
      currentIndex = (currentIndex - 1 + slides.length) % slides.length;
      showSlide(currentIndex);
    }
  
    prevBtn.addEventListener('click', showPrev);
    nextBtn.addEventListener('click', showNext);
  
    // Auto slide every 5 seconds
    setInterval(showNext, 5000);
  
    // Initialize
    showSlide(currentIndex);
  
    // Menu toggle for mobile
    const menuToggle = document.querySelector('.menu-toggle');
    const navList = document.querySelector('.nav-list');
    menuToggle.addEventListener('click', () => {
      navList.classList.toggle('show');
    });
  });
  
