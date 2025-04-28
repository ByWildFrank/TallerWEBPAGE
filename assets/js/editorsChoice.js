document.addEventListener('DOMContentLoaded', () => {
    let slideIndex = 1;
    const slides = document.querySelectorAll('.carousel-slide');
    const dots   = document.querySelectorAll('.dot');
    function showSlide(n) {
      if (n > slides.length) slideIndex = 1;
      if (n < 1) slideIndex = slides.length;
      slides.forEach((s, i) => {
        s.classList.remove('active','prev','next');
        if (i === slideIndex-1) s.classList.add('active');
        else if (i === (slideIndex % slides.length)) s.classList.add('next');
        else if (i === (slideIndex-2 + slides.length) % slides.length) s.classList.add('prev');
      });
      dots.forEach((d, i) => d.classList.toggle('active', i === slideIndex-1));
    }
    window.changeSlide = n => showSlide(slideIndex += n);
    window.goToSlide   = n => showSlide(slideIndex = n);
    window.moreInfo    = name => alert('Más información sobre ' + name);
    showSlide(slideIndex);
  });