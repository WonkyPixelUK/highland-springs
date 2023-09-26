import Swiper from 'swiper';
import 'swiper/css';
import { Navigation, Pagination } from 'swiper/modules';

/**
 * Initialize
 */
const initialize = () => {

	const tableSwiper = document.querySelector('.js-nutrition-table')
	
	if ( tableSwiper ) {
		initSwiper( tableSwiper )
	}

}

/**
 * Add functions here
 */

const titles = document.querySelectorAll('.b-nutrition-table__slider__slide');
const title = [];
titles.forEach(function(element) {
    title.push(element.dataset.title);
});

const initSwiper = ( tableSwiper ) => {
	new Swiper( tableSwiper , {
        modules: [Navigation, Pagination],
        spaceBetween: 30,
        grabCursor: true,
        slidesPerView: 1,
        loop: false,
        pagination: {
            el: '.b-nutrition-table__slider__pagination',
            clickable: true,
            renderBullet: function (index, className) {
              return '<span class="' + className + '">' + title[index] + '</span>';
            }
        }
	});
}

export default initialize;