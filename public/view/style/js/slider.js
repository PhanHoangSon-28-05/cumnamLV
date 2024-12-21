let currentIndex = 0;
    const sliderTrack = document.getElementById('sliderTrack');
    const totalSlides = document.querySelectorAll('.slider-item').length;

    function slide() {
      currentIndex = (currentIndex + 1) % totalSlides;
      sliderTrack.style.transform = `translateX(-${currentIndex * 100}%)`;
    }

    setInterval(slide, 5000); // Chuyển động mỗi 5 giây
