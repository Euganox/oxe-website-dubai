mapboxgl.accessToken = 'pk.eyJ1Ijoia29uZGFrb3YiLCJhIjoiY2w5d3l3bHk2MDU0NTN5cGk4b294ZThyaiJ9.oUqVR7L78ggiNqa7CMofNQ';
let dubaiOffice = [55.2768, 25.1850];

let map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/dark-v10',
    center: [55.2768, 25.1850],
    zoom: 13,
    scrollZoom: false,
    doubleClickZoom: false,
    dragPan: false,
    dragRotate: false,
});

map.on('load', () => {
    // create the marker
    const marker = new mapboxgl.Marker({
        color: "#C72D37",
    }).setLngLat(dubaiOffice).addTo(map);
});