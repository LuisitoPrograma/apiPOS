(function() {
"use strict";

/**
 * Toggle mobile nav dropdowns
 */
document.querySelectorAll('.navmenu .toggle-dropdown').forEach(navmenu => {
navmenu.addEventListener('click', function(e) {
e.preventDefault();
this.parentNode.classList.toggle('active');
this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
e.stopImmediatePropagation();
});
});

/**
* Navmenu Scrollspy
*/
let navmenulinks = document.querySelectorAll('.navmenu a');

function navmenuScrollspy() {
navmenulinks.forEach(navmenulink => {
if (!navmenulink.hash) return;
let section = document.querySelector(navmenulink.hash);
if (!section) return;

// Obtener la posición del viewport del elemento
let rect = section.getBoundingClientRect();
let position = window.scrollY + 200;

if (rect.top <= 200 && rect.bottom >= 200) {
document.querySelectorAll('.navmenu a.active').forEach(link => link.classList.remove('active'));
navmenulink.classList.add('active');
} else {
navmenulink.classList.remove('active');
}
})
}
window.addEventListener('load', navmenuScrollspy);
document.addEventListener('scroll', navmenuScrollspy);

})();