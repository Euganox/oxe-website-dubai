
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.31.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.31.0/mapbox-gl.css' rel='stylesheet' />
    <style>
        .marker {
            display: block;
            border: 2px solid #c82c37;
            border-radius: 50%;
            cursor: pointer;
            padding: 0;
            background-size: cover;
        }

        #mapIn { min-height: 300px; }
    </style>
    <hr>
    <blockquote>
        <p>Расположение</p>
    </blockquote>
    <div id='mapIn'></div>
    <script>
            zmlvl = 16;
        mapboxgl.accessToken = 'pk.eyJ1Ijoia29uZGFrb3YiLCJhIjoiY2w5d3l3bHk2MDU0NTN5cGk4b294ZThyaiJ9.oUqVR7L78ggiNqa7CMofNQ';
        let map = new mapboxgl.Map({
            container: 'mapIn', // container id
            // TODO uncomment the line and add MB styles (white map)
            style: 'mapbox://styles/mapbox/light-v9', //stylesheet location
            center: [55.2768, 25.1850], // starting position
            zoom: zmlvl // starting zoom
        });

        // Add zoom and rotation controls to the map.
        map.addControl(new mapboxgl.NavigationControl());
        // disable map rotation using right click + drag
        map.dragRotate.disable();

        map.scrollZoom.disable();

        // disable map rotation using touch rotation gesture
        map.touchZoomRotate.disableRotation();

        let el = document.createElement('div');
        el.style.backgroundImage = 'url(/public/assets/images/mapPoint.png)';
        el.style.width = '30px';
        el.style.height = '30px';

        // add marker to map
        new mapboxgl.Marker(el, {offset: [-20, -20]}).setLngLat([55.2768, 25.1850]).addTo(map);

    </script>
