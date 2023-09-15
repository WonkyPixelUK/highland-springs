/**
 * Initialize
 */
const initialize = () => {
  let burger = document.querySelector('.js-burger');
  let menu = document.querySelector('.c-navigation--secondary');
  let header = document.querySelector('.o-header');

  burger.addEventListener('click', (e)=>{
    menu.classList.toggle('is-open');
    header.classList.toggle('secondary-open');
  });

}

/**
 * Add functions here
 */


export default initialize;