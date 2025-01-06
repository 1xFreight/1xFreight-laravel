// HEADER SCROLL DOWN
document.addEventListener("DOMContentLoaded", function () {
    const header = document.querySelector('header');
    const bodyClass = document.body.classList;
    let lastScrollY = window.scrollY;

    if (bodyClass.contains('innerpage')) {
        header.classList.add('scrolled');
        header.classList.add('change');
    }

    document.addEventListener('scroll', function () {
        const currentScrollY = window.scrollY;
        const scrollUp = currentScrollY < lastScrollY;
        const headerHeight = header.offsetHeight + 150;

        if (currentScrollY > headerHeight) {
            if (scrollUp) {
                header.classList.add('visible');
                header.classList.remove('hidden');
            } else {
                header.classList.add('hidden');
                header.classList.remove('visible');
            }
        } else {
            header.classList.remove('hidden');
            header.classList.remove('visible');
        }

        if (currentScrollY > 50) {
            header.classList.add('change');
        } else {
            header.classList.remove('change');
        }

        lastScrollY = currentScrollY;
    });
});

// HAMBURGER MENU
document.addEventListener("DOMContentLoaded", function () {
    const openMenuButton = document.querySelector(".lines");
    const closes = document.querySelectorAll(".menu_overlay, .close-x");
    const body = document.body;

    openMenuButton.addEventListener("click", function () {
      body.classList.toggle("menuOpen");

      if(openMenuButton) {
        openMenuButton.classList.toggle('active');
      }
    });

    closes.forEach(close => {
        close.addEventListener("click", function () {
            body.classList.remove("menuOpen");
        })
    })
});


// TYPING TEXT
const typedTextSpan = document.querySelector(".typed-text");
if(typedTextSpan) {
    const cursorSpan = document.querySelector(".cursor");

    const textArray = ["email chaos", "inconsistent rates", "tracking mess"];
    const typingDelay = 100;
    const erasingDelay = 100;
    const newTextDelay = 1000; 
    let textArrayIndex = 0;
    let charIndex = 0;

    function type() {
    if (charIndex < textArray[textArrayIndex].length) {
        if(!cursorSpan.classList.contains("typing")) cursorSpan.classList.add("typing");
        typedTextSpan.textContent += textArray[textArrayIndex].charAt(charIndex);
        charIndex++;
        setTimeout(type, typingDelay);
    } 
    else {
        cursorSpan.classList.remove("typing");
        setTimeout(erase, newTextDelay);
    }
    }

    function erase() {
        if (charIndex > 0) {
        if(!cursorSpan.classList.contains("typing")) cursorSpan.classList.add("typing");
        typedTextSpan.textContent = textArray[textArrayIndex].substring(0, charIndex-1);
        charIndex--;
        setTimeout(erase, erasingDelay);
    } 
    else {
        cursorSpan.classList.remove("typing");
        textArrayIndex++;
        if(textArrayIndex>=textArray.length) textArrayIndex=0;
        setTimeout(type, typingDelay + 1100);
    }
    }

    document.addEventListener("DOMContentLoaded", function() { // On DOM Load initiate the effect
    if(textArray.length) setTimeout(type, newTextDelay + 250);
    });
}

// FEATURES
let swiperFeatures = document.getElementsByClassName('swiperFeatures').length;
if(swiperFeatures) {
    const swiper = new Swiper(".swiperFeatures", {
        slidesPerView: 1,
        loop: true,
        grabCursor: true,
        navigation: {
            nextEl: ".feature-next",
            prevEl: ".feature-prev",
        },
        pagination: {
            el: ".pagination",
            clickable: true,
        }
    });
}



// Blog
let swiperBlog = document.getElementsByClassName('swiperBlog').length;
if(swiperBlog) {
    const swiper = new Swiper(".swiperBlog", {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        grabCursor: true,
        pagination: {
            el: ".pagination",
            clickable: true,
        },
        breakpoints: {
        993: {
            slidesPerView: 3,
        },
        600: {
            slidesPerView: 2,
        },
        0: {
            slidesPerView: 1,
        },
        },
    });
}