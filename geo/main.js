
$(function () {
    $('#refresh').click(function () {
        getCurrentPosition(onSuccess, onError);
    });
});

function getCurrentPosition(success, error) {
    navigator.geolocation.getCurrentPosition(success, error);
}

function onSuccess (position) {
    var pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
        },
        map,
        marker;

    $('#lat').text(pos.lat);
    $('#long').text(pos.lng);

    map = new google.maps.Map($('#map')[0], {
        zoom: 10,
        center: pos
    });
    marker = new google.maps.Marker({
        position: pos,
        map: map
    });

    console.log('Success!!');
}

function onError () {
    console.log('Error!!');
}

function renderMap () {
    getCurrentPosition(onSuccess, onError);
}
