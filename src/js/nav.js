import _ from 'lodash';
console.log(_.join(['Nav', 'module', 'loaded!'], ' '));



/* -------------------------------------------------------
                 Adding components in Html
---------------------------------------------------------*/
document.addEventListener("DOMContentLoaded", function () {
  var includes = document.querySelectorAll('[data-include]');

  includes.forEach(function (element) {
    var file = '../components/' + element.getAttribute('data-include') + '.html';

    // Fetch the HTML content
    fetch(file)
      .then(response => response.text())
      .then(data => {
        // Insert the HTML content into the element
        element.innerHTML = data;
      })
      .catch(error => console.error('Error fetching ' + file, error));
  });
});

/* -------------------------------------------------------
                 Offcanvas menu
---------------------------------------------------------*/
export function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

export function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}



