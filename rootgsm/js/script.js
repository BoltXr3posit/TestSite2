
/*Footer You are Here Function*/
document.addEventListener("DOMContentLoaded", function() {
  var navLinks = document.querySelectorAll("nav ul li a");
  var currentPage = window.location.pathname.split("/").pop().split("?")[0];

  for (var i = 0; i < navLinks.length; i++) {
    var link = navLinks[i];
    var href = link.getAttribute("href").split("?")[0];

    if (currentPage === href || (currentPage === '' && href === '../')) {
      link.classList.add("active");
    }
  }
});