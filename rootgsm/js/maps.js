
function initMap() {
    // Create a map object with options
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 37.7749, lng: -122.4194}, // Example: San Francisco coordinates
        zoom: 12 // Set the initial zoom level
    });

    // Add markers for locations (customized to your needs)
    var marker = new google.maps.Marker({
        position: {lat: 37.7749, lng: -122.4194}, // Example: San Francisco marker
        map: map,
        title: 'San Francisco'
    });

    // Add more markers or customize as necessary
    // Repeat the marker creation code for each location you want to display
}
