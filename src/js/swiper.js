import _ from 'lodash';
console.log(_.join(['Swiper', 'module', 'loaded!'], ' '));

import 'swiper/swiper-bundle.css';
import Swiper from 'swiper/bundle';


document.addEventListener('DOMContentLoaded', () => {
    const swiper = new Swiper('.portfolio-details-slider', {
        speed: 400,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true,
        },
        slidesPerView: 1,
        slidesPerGroup: 1,
    });
});