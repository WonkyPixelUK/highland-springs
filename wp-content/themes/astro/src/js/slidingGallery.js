import Swiper from 'swiper';
import 'swiper/css';
import 'swiper/css/effect-coverflow';
import { Navigation } from 'swiper/modules';

/**
 * Initialize
 */
const initialize = () => {

	const swiper = document.querySelector('.js-packages-swiper')
	
	if ( swiper ) {
		initSwiper( swiper )
	}

}

/**
 * Add functions here
 */
const initSwiper = ( swiper ) => {
	new Swiper( swiper , {
      modules: [Navigation],
		  spaceBetween: 24,
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 2,
      loop: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        786:{
          slidesPerView: 3
        },
        1450: {
          slidesPerView: 4
        }
		  }
	});
}

export default initialize;