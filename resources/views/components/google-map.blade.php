<div>
    <div {{ $attributes->merge(['id' => 'map']) }}></div>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_api_key') }}&callback=initMap" async defer></script>
</div> 