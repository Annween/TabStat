

/*(function() {
  // detect CSS position:sticky support by checking elements display as it is set to block in css supports rule

  var newEl = document.createElement('detect');
  document.body.appendChild(newEl);

  if (getComputedStyle(newEl).getPropertyValue('display') === 'none') {
    // only browsers that don't support sticky get this

    document.getElementById('table').addEventListener('scroll', function() {
      var translate = 'translate(0,' + this.scrollTop + 'px)';
      var myElements = this.querySelectorAll('thead');
      for (var i = 0; i < myElements.length; i++) {
        myElements[i].style.transform = translate;
      }
    });
    // endif
  }
})();
*/ 

