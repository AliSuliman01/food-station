<div id="map" class="h-96 relative w-full">
    <button class="map-expand">
       <span
           class="absolute z-10 bottom-1 right-2 border border-2 border-gray-300 p-2 bg-white rounded">  <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15"></path>
        </svg>
       </span>
    </button>
</div>
<script type="text/javascript">

    const apiKey = "AAPK9feac71d90ac41b2ad6bb5b768e9091bZl6gP7Yp04FQaKI51ndVRtQNF4yFXozbY9WfazBlK0MrSoXYNth3MEYeHx8K-TjF";
    const successCallback = (position) => {
        console.log(position);

        let initLat = "{{$initLat}}";
        let initLong = "{{$initLong}}";

        const key = 'pKy3A71C7ysa8YIcosVV';
        const basemapEnum = "ArcGIS:Streets";
        window.map = new maplibregl.Map({
            container: 'map', // container's id or the HTML element in which MapLibre GL JS will render the map
            style: `https://basemaps-api.arcgis.com/arcgis/rest/services/styles/${basemapEnum}?type=style&token=${apiKey}`, // style URL
            center: [initLong ?? position.coords.longitude, initLat ?? position.coords.latitude], // starting position [lng, lat]
            zoom: 15, // starting zoom
        });

        map.addControl(new maplibregl.NavigationControl(), 'top-right');

        window.marker = new maplibregl.Marker()
            .setLngLat([initLong ?? position.coords.longitude, initLat ?? position.coords.latitude])
            .addTo(map);


        map.on('click', function (e) {
            marker.setLngLat(e.lngLat)

        });

        maplibregl.setRTLTextPlugin(
            'https://cdn.maptiler.com/mapbox-gl-js/plugins/mapbox-gl-rtl-text/v0.2.3/mapbox-gl-rtl-text.js',
            null,
            true // Lazy load the plugin
        );


        async function getUserLocationByIP() {
            const response = await fetch(`https://api.maptiler.com/geolocation/ip.json?key=${key}`);
            const geolocation = await response.json();
            return geolocation;
        }

        function getLanguageByCountryAndRegion(country_code, region_code) {
            if (country_code === "ES") { //Spain
                if (region_code === "CT") { //Catalonia
                    return "ca";
                } else {
                    return "es";
                }
            } else if (country_code === "CZ") { //Czechia
                return "cs";
            } else if (country_code === "FR") { //France
                return "fr";
            } else if (country_code === "DE") { //Germany
                return "de";
            } else if (country_code === "JP") { //Japan
                return "ja";
            } else if (country_code === "UA") { //Ukraine
                return "uk";
            } else if (country_code === "US" || country_code === "GB") { //United States of America or Great Britain
                return "en";
            } else if (country_code === "EG") { //Egypt
                return "ar";
            } else {
                return "latin"
            }
        }

        function setMapLanguage(map, language) {
            // Set the new language to layers
            map.setLayoutProperty('continent', 'text-field', ['get', 'name:' + language]);
            map.setLayoutProperty('country', 'text-field', ['get', 'name:' + language]);
            map.setLayoutProperty('state', 'text-field', ['get', 'name:' + language]);
            map.setLayoutProperty('city', 'text-field', ['get', 'name:' + language]);
            map.setLayoutProperty('town', 'text-field', ['get', 'name:' + language]);
        }

        window.resetMarker = () => {
            marker.setLngLat([position.coords.longitude, position.coords.latitude])
            map.setCenter([position.coords.longitude, position.coords.latitude]);
        }

        // map.on('load', async  () => {
        //
        // const geolocationIP = await getUserLocationByIP();
        // const {country_code, region_code} = geolocationIP;
        // const language = getLanguageByCountryAndRegion(country_code, region_code);
        // setMapLanguage(map, language);

        // const authentication = arcgisRest.ApiKeyManager.fromKey(apiKey);
        //
        // arcgisRest
        //     .solveRoute({
        //         stops: [
        //             [position.coords.longitude, position.coords.latitude],
        //             [37.145764, 36.219208],
        //             [37.150806, 36.215526]
        //         ],
        //         authentication
        //     })
        //     .then((response) => {
        //         console.log(response);
        //
        //         console.log(response.routes.features[0].geometry.paths[1])
        // map.addSource('route', {
        //     'type': 'geojson',
        //     'data': {
        //         'type': 'Feature',
        //         'properties': {},
        //         'geometry': {
        //             'type': 'LineString',
        //             'coordinates': [
        //                 [position.coords.longitude, position.coords.latitude],
        //                 [37.145764, 36.219208],
        //                 [37.150806, 36.215526]
        //             ]
        //         }
        //     }
        // });
        // map.addLayer({
        //     'id': 'route',
        //     'type': 'line',
        //     'source': 'route',
        //     'layout': {
        //         'line-join': 'round',
        //         'line-cap': 'round'
        //     },
        //     'paint': {
        //         'line-color': '#F00',
        //         'line-width': 8
        //     }
        // });
        //     });
        //
        // });
    };

    const errorCallback = (error) => {
        console.log(error);
    };

    navigator.geolocation.getCurrentPosition(successCallback, errorCallback);

</script>
