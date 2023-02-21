<x-app-layout>
    <div class="absolute top-16 right-0 left-0 bottom-0">
        <x-map/>
    </div>

    <script type="text/javascript">

        $(document).ready(function () {

            if (window.map) {

                @foreach($restaurants as $restaurant)

                new maplibregl.Marker()
                    .setLngLat(["{{$restaurant->longitude}}", "{{$restaurant->latitude}}"])
                    .addTo(window.map);
                @endforeach
            }
        });
    </script>

</x-app-layout>
