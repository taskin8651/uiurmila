// ================= HERO SLIDER =================

document.addEventListener("DOMContentLoaded", function () {
    const slides = document.querySelectorAll(".hero-slide");
    const dots = document.querySelectorAll(".hero-dots button");
    const prevBtn = document.querySelector(".hero-prev");
    const nextBtn = document.querySelector(".hero-next");

    if (!slides.length) return;

    let current = 0;
    let timer;
    const delay = 5000;

    function showSlide(index) {
        slides.forEach(function (slide) {
            slide.classList.remove("active");
        });

        dots.forEach(function (dot) {
            dot.classList.remove("active");
        });

        slides[index].classList.add("active");

        if (dots[index]) {
            dots[index].classList.add("active");
        }

        current = index;
    }

    function nextSlide() {
        let next = (current + 1) % slides.length;
        showSlide(next);
    }

    function prevSlide() {
        let prev = (current - 1 + slides.length) % slides.length;
        showSlide(prev);
    }

    function startSlider() {
        timer = setInterval(nextSlide, delay);
    }

    function restartSlider() {
        clearInterval(timer);
        startSlider();
    }

    if (nextBtn) {
        nextBtn.addEventListener("click", function () {
            nextSlide();
            restartSlider();
        });
    }

    if (prevBtn) {
        prevBtn.addEventListener("click", function () {
            prevSlide();
            restartSlider();
        });
    }

    dots.forEach(function (dot, index) {
        dot.addEventListener("click", function () {
            showSlide(index);
            restartSlider();
        });
    });

    showSlide(current);
    startSlider();
});