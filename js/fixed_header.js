'use strict'
window.onload = function(){
  var tabcontent = document.querySelector('tabcontent')
  /**
   * scroll handle
   * @param {event} e -- scroll event
   */
  function scrollHandle (e){
    var scrollTop = this.scrollTop;
    this.querySelector('thead').style.transform = 'translateY(' + scrollTop + 'px)';
  }
  
  tabcontent.addEventListener('scroll',scrollHandle)
}
	