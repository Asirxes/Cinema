function initMap() {
    const uluru = { lat: 51.2465, lng: 22.5684 };
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 4,
        center: uluru,
    });
    const marker = new google.maps.Marker({
        position: uluru,
        map: map,
    });
}
window.initMap = initMap;