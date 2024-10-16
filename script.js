document.addEventListener('DOMContentLoaded', function () {
  // Navigation toggle
  const navToggle = document.querySelector(".nav-toggle");
  const navLinks = document.querySelector(".nav-links");
  const heroContent = document.querySelector('.hero-content');

  if (navToggle && navLinks && heroContent) {
    navToggle.addEventListener("click", () => {
      navLinks.classList.toggle("active");
      navToggle.classList.toggle("active");

      if (navLinks.classList.contains('active')) {
        heroContent.classList.add('dimmed');
      } else {
        heroContent.classList.remove('dimmed');
      }
    });
  }

  // AOS initialization
  AOS.init({
    duration: 800,
    easing: 'ease-in-out',
    once: true,
    mirror: false
  });


  // Gallery modal
  const galleryItems = document.querySelectorAll('.gallery-item');
  const modal = document.getElementById('modal');
  const modalImg = document.getElementById('modal-image');
  const closeModal = document.querySelector('.close');

  if (galleryItems.length > 0 && modal && modalImg && closeModal) {
    galleryItems.forEach(item => {
      item.addEventListener('click', () => {
        const img = item.querySelector('.gallery-image');
        modal.style.display = "flex";
        modalImg.src = img.src;
      });
    });

    closeModal.addEventListener('click', () => {
      modal.style.display = "none";
    });
  }
});
