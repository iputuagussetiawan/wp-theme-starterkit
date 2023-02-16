// import Swiper bundle with all modules installed
import gsap from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";
import Swiper from 'swiper/bundle';
// import styles bundle
import 'swiper/css/bundle';

//variable declaration
let featuredInImageContainer=document.querySelectorAll('.featured-in__image-container');
let number=0;
let featuredInImageContainerLength=featuredInImageContainer.length

setInterval(changeActiveClass, 1000);
function changeActiveClass() {
    number++;
    if(number==featuredInImageContainerLength){
        number=0;
    }
    featuredInImageContainer.forEach((featuredInImage) => {
        featuredInImage.classList.remove('active');
    });
    featuredInImageContainer[number].classList.add('active');
}

gsap.registerPlugin(ScrollTrigger); 

//gsap.to(".banner__title", {rotation: 27, x: 100, duration: 1});

let testimonialSlider = new Swiper('.testimonials-slider ', {
    slidesPerView: 1,
    spaceBetween: 10,
    // speed:1000,
    loop:false,
    autoHeight:true,
    // autoplay: {
    //     delay: 1,
    // },
    // freeMode: {
    //     enabled: true,
    // },
    //touchRatio:1,
    pagination: {
        el: ".swiper-pagination-testimonial",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next-testimonial",
        prevEl: ".swiper-button-prev-testimonial",
    }, 
    breakpoints: {
        1024:{
            spaceBetween: 24,
            slidesPerView: 2,
            autoHeight:false,
        },
        1440:{
            spaceBetween: 24,
            slidesPerView: 2,
            autoHeight:false,
        },
    }
});

var swiper = new Swiper(".featured-in__swiper", {
    spaceBetween: 64,
    slidesPerView: 2,
    centeredSlides: true,
    roundLengths: true,
    loop: true,
    loopAdditionalSlides: 30,
    speed:1000,
   // autoHeight:true,
    autoplay: {
        delay: 3000,
    },
    // pagination: {
    //     el: ".swiper-pagination-bannerslide",
    //     clickable: true,
    // },
    // navigation: {
    //     nextEl: ".swiper-button-next-bannerslide",
    //     prevEl: ".swiper-button-prev-bannerslide",
    // },
});

window.addEventListener("load", function () {	
    counterSubscriber();
    let ourTechnologySliderContainer = document.querySelector(
        "#our_technology_slider"
    );
    let ourTechnologySlider = new Swiper('.our-technology__slider', {
        slidesPerView: 4,
        loop: true,
        freeMode: {
            enabled: true,
        },
        autoplay: {
            delay: 1,
        },
        speed: 3000,
        // grid: {
        //   rows: 2,
        // },
        spaceBetween: 30,
        breakpoints: {
            768:{
                spaceBetween: 24,
                slidesPerView: 6,
            },
            1024:{
                spaceBetween: 24,
                slidesPerView: 9,
            },
            1440:{
                spaceBetween: 30,
                slidesPerView: 10,
            },
        }
    });
    ourTechnologySliderContainer.addEventListener("mouseenter", (e) => {
        ourTechnologySlider.autoplay.stop();
    });
    ourTechnologySliderContainer.addEventListener("mouseleave", (e) => {
        ourTechnologySlider.autoplay.start();
    });
});


function format_number(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
};

function counterAction(el,value){
    gsap.from(value, {
        scrollTrigger: ".our-approach", 
        duration: 3,
        ease: 'circ.out',
        val: 0,
        roundProps: 'val',
        onUpdate: function() {
            el.innerText = format_number(value.val);
        }
    })
}

function counterSubscriber(){
    let totalSubscriberYT = document.getElementById('complatedProject'),
    totalSubscriberYTValue = {
        val: parseInt(totalSubscriberYT.dataset.value)
    };

    let totalViewYT = document.getElementById('yearExperience'),
    totalViewYTValue = {
        val: parseInt(totalViewYT.dataset.value)
    };

    let merchanSold = document.getElementById('businessProductivity'),
    merchanSoldValue = {
        val: parseInt(merchanSold.dataset.value)
    };

    let appDownload = document.getElementById('decreaseCost'),
    appDownloadValue = {
        val: parseInt(appDownload.dataset.value)
    };

    counterAction(totalSubscriberYT,totalSubscriberYTValue);
    counterAction(totalViewYT,totalViewYTValue);
    counterAction(merchanSold,merchanSoldValue);
    counterAction(appDownload,appDownloadValue);
}


// CLIENT LOGO RANDOMIZER
const brandList = JSON.parse(vendorData.dataVendor)
let VISIBLE_IMAGE_COUNT = 20
if(brandList.length + 2 < VISIBLE_IMAGE_COUNT) {
    VISIBLE_IMAGE_COUNT = brandList.length - 2
}
const visibleBrandList = []

for (let index = 0; index < VISIBLE_IMAGE_COUNT; index++) {
    visibleBrandList.push(index)
}

const visibleBrandElements = document.querySelectorAll('.about-trustedby__image-container.d-flex');

const randomBrandGallery = (max) => {
    const randomNumber = Math.floor(Math.random() * Math.floor(max));

    if(visibleBrandList.includes(randomNumber)) {
        randomBrandGallery(brandList.length - 1)
    } else {
        const randomIndex = Math.floor(Math.random() * Math.floor(VISIBLE_IMAGE_COUNT-1));
        visibleBrandList.splice(randomIndex, 1, randomNumber)

        visibleBrandElements[randomIndex].classList.add('out');

        setTimeout(() => {
            visibleBrandElements[randomIndex].querySelector('img').src = brandList[randomNumber].partnerImage;
            visibleBrandElements[randomIndex].classList.remove('out');
        }, 500);
        return
    }
};

setInterval(() => {
    randomBrandGallery(brandList.length - 1);
}, 2000);
// CLIENT LOGO RANDOMIZER END



