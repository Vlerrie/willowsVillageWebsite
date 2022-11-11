const street_number = document.querySelector('#street_number');
const route = document.querySelector('#street_name');
const sublocality = document.querySelector('#street_suburb');
const locality = document.querySelector('#street_city');
const postal_code = document.querySelector('#street_zip');
const registerButton = document.querySelector('#registerButton');

function initMap() {
    input = document.getElementById('floatingFieldThing');
    //northeast = -25.752597, 28.324517
    //southwest = -25.771005, 28.302190
    const defaultBounds = {
        north: -25.752597,
        south: -25.771005,
        east: 28.324517,
        west: 28.302190,
    };
    const options = {
        bounds: defaultBounds,
        componentRestrictions: {country: "za"},
        fields: ["address_components", "geometry", "icon", "name"],
        strictBounds: true,
        types: ["address"],
    };

    const autocomplete = new google.maps.places.Autocomplete(input, options);

    autocomplete.setBounds({east: 180, west: -180, north: 90, south: -90});

    autocomplete.addListener("place_changed", () => {

        const place = autocomplete.getPlace();

        if (!place.geometry || !place.geometry.location) {
            window.alert("No details available for input: '" + place.name + "'");
        } else {
            place.address_components.forEach(function (item) {
                item.types.forEach(function (subItem) {
                    if (typeof window[subItem] !== 'undefined') {
                        window[subItem].value = item.long_name
                    }
                });
            });
            registerButton.removeAttribute('disabled');
        }
    });
}

function initMapFull() {
    input = document.getElementById('floatingFieldThing');
    //north = -22.073816
    //east = 33.143327
    //south = -34.903713
    //west =  16.409193
    const defaultBounds = {
        north: -22.073816,
        south: -34.903713,
        east: 33.143327,
        west: 16.409193,
    };
    const options = {
        bounds: defaultBounds,
        componentRestrictions: {country: "za"},
        fields: ["address_components", "geometry", "icon", "name"],
        strictBounds: true,
        types: ["address"],
    };

    const autocomplete = new google.maps.places.Autocomplete(input, options);

    autocomplete.setBounds({east: 180, west: -180, north: 90, south: -90});

    autocomplete.addListener("place_changed", () => {

        const place = autocomplete.getPlace();

        if (!place.geometry || !place.geometry.location) {
            window.alert("No details available for input: '" + place.name + "'");
        } else {
            place.address_components.forEach(function (item) {
                item.types.forEach(function (subItem) {
                    if (typeof window[subItem] !== 'undefined') {
                        window[subItem].value = item.long_name
                    }
                });
            });
            registerButton.removeAttribute('disabled');
        }
    });
}

function clearAddressFields() {
    street_number.value = route.value = sublocality.value = locality.value = postal_code.value = ''
}

function validateRegister() {
    canRegister = true;
    messages = [];
    if (!street_number.value.length > 1) {
        canRegister = false;
    }
}
