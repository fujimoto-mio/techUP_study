document.addEventListener("DOMContentLoaded", function () {
    const track = document.getElementById('carouselTrack');
    if (!track) return;
  
    const slides = document.querySelectorAll('.carousel-slide');
    const slideWidth = 699; // 669 + margin左右15×2
    let currentIndex = 1;
  
    function updateSlide() {
      track.style.transform = `translateX(-${slideWidth * currentIndex}px)`;
    }
  
    function goToNextSlide() {
      currentIndex = (currentIndex + 1) % slides.length;
      updateSlide();
    }
  
    function goToPrevSlide() {
      currentIndex = (currentIndex - 1 + slides.length) % slides.length;
      updateSlide();
    }
  
    document.getElementById('nextBtn').addEventListener('click', () => {
      goToNextSlide();
      resetAutoSlide();
    });
  
    document.getElementById('prevBtn').addEventListener('click', () => {
      goToPrevSlide();
      resetAutoSlide();
    });
  
    let autoSlide = setInterval(goToNextSlide, 5000);
  
    function resetAutoSlide() {
      clearInterval(autoSlide);
      autoSlide = setInterval(goToNextSlide, 5000);
    }
  
    updateSlide();
  });
  