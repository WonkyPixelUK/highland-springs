/**
 * Initialize
 */
const initialize = () => {
  let carousel = document.querySelector('.c-carousel');

  if (carousel) {
    swipeListen(carousel);
    clickAndDragListen(carousel);
  }
}

/**
 * Add functions here
 */

let swipeListen = (carousel) => {
  let touchstartX = 0
  let touchendX = 0
      
  let checkDirection = () => {
    if (touchendX < touchstartX){
      swipeCarousel(carousel, 'left');
    }else{
      swipeCarousel(carousel, 'right');
    }
  }

  carousel.addEventListener('touchstart', e => {
    touchstartX = e.changedTouches[0].screenX
  })

  carousel.addEventListener('touchend', e => {
    touchendX = e.changedTouches[0].screenX
    checkDirection()
  })
}

let clickAndDragListen = (carousel) => {
  let clickstartX = 0
  let clickendX = 0
      
  let checkDirection = () => {
    if (clickendX > clickstartX){
      swipeCarousel(carousel, 'left');
    }else if(clickendX < clickstartX){
      swipeCarousel(carousel, 'right');
    }
  }

  carousel.addEventListener('mousedown', e => {
    clickstartX = e.screenX
  })

  carousel.addEventListener('mouseup', e => {
    clickendX = e.screenX
    checkDirection()
  })
}

let swipeCarousel = (carousel, direction) => {
  let carouselImages = carousel.querySelectorAll('.c-carousel__item');
  let carouselImagesCount = carouselImages.length;

  // go through all image and replace the classes they have (0,1,2,3,4,5) with a +1 class 
  for (let i = 0; i < carouselImagesCount; i++) {
    let currentImage = carouselImages[i]; // get the current image
    let currentImageClass = currentImage.classList[1]; // get the class
    let currentImageClassNumber = parseInt(currentImageClass.split('--')[1]); // get the number from the class
    
    if(direction == 'left') {
      let newImageClassNumber = currentImageClassNumber + 1; 
      if (newImageClassNumber > carouselImagesCount - 1) { // if the number is bigger than the amount of images, reset it to 0
        newImageClassNumber = 0; 
      }
      currentImage.classList.remove(currentImageClass);
      currentImage.classList.add('c-carousel__item--' + newImageClassNumber);
    }else{
      let newImageClassNumber = currentImageClassNumber - 1;
      if (newImageClassNumber < 0) { // if the number is bigger than the amount of images, reset it to 0
        newImageClassNumber = carouselImagesCount - 1; 
      }
      currentImage.classList.remove(currentImageClass);
      currentImage.classList.add('c-carousel__item--' + newImageClassNumber);
    }
  }

}


export default initialize;