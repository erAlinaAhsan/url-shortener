<!-- resources/views/details.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>URL Details</title>
    <!-- Add your CSS styles or external CSS links here -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="maincontainer">
        <h2 class="text-center">URL Details</h2>
        <div class="details-container">
            <p>ID: {{ $shortLink->id }}</p>
            <p>Short Link: <a href="{{ route('url.shortener', $shortLink->code) }}"
                    target="_blank">{{ route('url.shortener', $shortLink->code) }}</a></p>
            <p>Original Link: {{ $shortLink->link }}</p>
            <p>IP: {{ $shortLink->ip }}</p>
            <p>City: {{ $shortLink->city }}</p>
            <p>Country: {{ $shortLink->country }}</p>
            <p>Latitude: {{ $shortLink->latitude }}</p>
            <p>Longitude: {{ $shortLink->longitude }}</p>
            <p>Timezone: {{ $shortLink->timezone }}</p>
            <p>Currency Code: {{ $shortLink->currency_code }}</p>
            <p>Currency Symbol: {{ $shortLink->currency_symbol }}</p>
        </div>
        <button class="btn btn-success copy-button ">
            <a href="{{ route('generate-shortlink') }}">Back</a></button>
        <script src="{{ asset('js/script.js') }}"></script>
        <!-- Add your JavaScript or external script links here if needed -->
    </div>
</body>

</html>
