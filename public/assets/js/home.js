// REVIEWS
var init = false;
var pricingCardSwiper;

function swiperReviews() {
     if (window.innerWidth <= 768) {
         // If the swiper is not yet initialized and the window width is greater than 768px
         if (!init) {
             init = true;
             pricingCardSwiper = new Swiper(".swiperReviews", {
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
                     499: {
                         slidesPerView: 2,
                     },
                     0: {
                         slidesPerView: 1,
                     },
                 },
             });
         }
     } else {
         if (init) {
             if (pricingCardSwiper && typeof pricingCardSwiper.destroy === 'function') {
                 pricingCardSwiper.destroy(true, true);
             }
             init = false;
         }
     }
}

swiperReviews();
window.addEventListener("resize", swiperReviews);


// ANIMATIONS
document.addEventListener("DOMContentLoaded", () => {
    gsap.registerPlugin(ScrollTrigger);

    const centerCard = document.querySelector(".position-center");
    const otherCards = document.querySelectorAll(".why-card:not(.position-center)");

    // WHY US SECTIONS
    gsap.from(".why-us .section-title h1, .why-us .section-title p", {
        scrollTrigger: {
            trigger: ".why-us",
            start: "top 80%",
            toggleActions: "play none none reverse",
        },
        opacity: 0,
        y: -50,
        duration: 1,
        ease: "power2.out",
    });

    ScrollTrigger.create({
        trigger: ".why-us",
        start: "top 80%", 
        onEnter: () => {
            gsap.set(centerCard, { opacity: 0, y: 30 });
            gsap.set(otherCards, { opacity: 0, y: 30 });
    
            gsap.to(centerCard, {
                opacity: 1,
                y: 0,
                duration: 1,
                ease: "power2.out",
            });
    
            gsap.to(otherCards, {
                opacity: 1,
                y: 0,
                duration: 1,
                stagger: 0.3,
                ease: "power2.out",
                delay: 0.2, 
            });
        },
    });


    //  BENEFITS SECTION
    gsap.from(".benefits *", { 
        scrollTrigger: {
            trigger: ".benefits",
            start: "top 60%", 
            toggleActions: "play none none reverse",
        },
        opacity: 0,
        y: -50, 
        duration: 1,
        ease: "power2.out",
    });


    // WORK STEPS SECTION
    gsap.from(".work-steps .section-title h1, .work-steps .section-title p", {
        scrollTrigger: {
            trigger: ".work-steps",
            start: "top 80%",
            toggleActions: "play none none reverse",
        },
        opacity: 0,
        y: -50,
        duration: 1,
        ease: "power2.out",
    });
    gsap.from(".work-steps .step", {
        scrollTrigger: {
            trigger: ".work-steps",
            start: "top 60%",
            toggleActions: "play none none reverse",
        },
        opacity: 0,
        y: 20, 
        duration: 0.8,
        stagger: 0.3,
        ease: "power2.out",
    });


    // FEATURES SECTION
    gsap.from(".features .section-title h1, .features .section-title p", {
        scrollTrigger: {
            trigger: ".features",
            start: "top 60%",
            toggleActions: "play none none reverse",
        },
        opacity: 0,
        y: -50,
        duration: 1,
        ease: "power2.out",
    });
    
    gsap.from(".features .swiper-slide", {
        scrollTrigger: {
            trigger: ".features",
            start: "top 60%",
            toggleActions: "play none none reverse",
        },
        opacity: 0,
        y: 20, 
        duration: 1,
        stagger: 0.5, 
        ease: "power2.out",
    });


    // REVIEWS SECTION
    gsap.from(".reviews .section-title h1, .reviews .section-title p", {
        scrollTrigger: {
            trigger: ".reviews",
            start: "top 60%",
            toggleActions: "play none none reverse",
        },
        opacity: 0,
        y: -50,
        duration: 1,
        ease: "power2.out",
    });
    
    gsap.from(".reviews .swiper-slide", {
        scrollTrigger: {
            trigger: ".reviews",
            start: "top 80%",
            toggleActions: "play none none reverse",
        },
        opacity: 0,
        y: 50,
        duration: 1,
        ease: "power2.out",
        stagger: 0.3,
    });
  

    // BLOG SECTION   
    gsap.from(".main-blog .section-title h1, .main-blog .section-title p", {
        scrollTrigger: {
            trigger: ".main-blog",
            start: "top 60%",
            toggleActions: "play none none reverse",
        },
        opacity: 0,
        y: -50,
        duration: 1,
        ease: "power2.out",
    });
    
    gsap.from(".main-blog .swiper-slide", {
        scrollTrigger: {
            trigger: ".main-blog",
            start: "top 60%",
            toggleActions: "play none none reverse",
        },
        opacity: 0,
        y: 50,
        duration: 0.8,
        ease: "power2.out",
        stagger: 0.3,
    });


    // ADVERTISAMENT SECTION
    gsap.from(".advertisement .add-text h3", {
        scrollTrigger: {
            trigger: ".advertisement",
            start: "top 80%", 
            toggleActions: "play none none reverse",
        },
        x: -100, // Move from left
        opacity: 0, 
        duration: 1,
        ease: "power2.out",
    });

    gsap.from(".advertisement .add-text p", {
        scrollTrigger: {
            trigger: ".advertisement",
            start: "top 80%", 
            toggleActions: "play none none reverse",
        },
        x: -100, 
        opacity: 0, 
        duration: 1,
        ease: "power2.out",
        delay: 0.2, 
    });

    gsap.from(".advertisement .banner-btn", {
        scrollTrigger: {
            trigger: ".advertisement",
            start: "top 80%", 
            toggleActions: "play none none reverse",
        },
        x: 100, 
        opacity: 0,
        duration: 0.5,
        ease: "power2.out",
    });
});


