/**
 * Initialize
 */
const initialize = () => {
	
  let menuVideo = document.querySelector('.c-navigation__video');
  let menuVideoButton = document.querySelector('.c-navigation__video-play');
  let actualVideo = document.querySelector('iframe');

  if(menuVideo && actualVideo){
    menuVideoButton.addEventListener('click', function(e) {
      e.preventDefault();
      menuVideo.classList.add('is-playing');
      actualVideo.src += "&autoplay=1";
    });
  }

}

/**
 * Add functions here
 */

export default initialize;