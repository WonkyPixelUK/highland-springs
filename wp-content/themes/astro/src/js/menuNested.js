/**
 * Initialize
 */
const initialize = () => {
	
  let menu = document.querySelector('.c-navigation--secondary');
  let topLevelItems = menu.querySelectorAll('.c-navigation__has-nested');

    topLevelItems.forEach(item => {
      // button means there's a nested menu
      let button = item.querySelector('.c-navigation__link--nested-trigger')
      let nestedMenu = item.querySelector('.c-navigation__list--nested');

      button.addEventListener('click', (e)=>{
        if(!button.classList.contains('active')){
          resetMenus();
          menu.classList.add('nestedOpen');
          button.classList.add('active');
          nestedMenu.classList.add('show');
        }else{
          resetMenus();
        }
      });
    });

}

/**
 * Add functions here
 */

let resetMenus = () => {
  let buttons = document.querySelectorAll('.c-navigation__link--nested-trigger');
  let nestedMenus = document.querySelectorAll('.c-navigation__list--nested');
  let menu = document.querySelector('.c-navigation--secondary');

  
  menu.classList.remove('nestedOpen');
  
  buttons.forEach(button => {
    button.classList.remove('active')
  });

  nestedMenus.forEach(menu => {
    menu.classList.remove('show')
  });
}

export default initialize;