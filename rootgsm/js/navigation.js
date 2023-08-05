// Get the navigation links
var navLinks = document.querySelectorAll("nav ul li a");

// Add event listeners to the navigation links
navLinks.forEach(function(link) {
    link.addEventListener("click", function(e) {
        // Remove the "active" class from all links
        navLinks.forEach(function(link) {
            link.classList.remove("active");
        });

        // Add the "active" class to the clicked link
        this.classList.add("active");

        // Prevent the default link behavior
        e.preventDefault();
    });
});
