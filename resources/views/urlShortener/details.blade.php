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
        <header>
            <div style="display: flex; align-items: center;">
                ✂️
                </button>
                <span style="color: white; margin-left: 10px;">
                    CLIPify</span>
            </div>
        </header>
        <h2 class="text-center">URL Details</h2>
        <div class="details-container">
            <p>ID: {{ $shortLink->id }}</p>
            <p>Short Link: <a href="{{ route('url.shortener', $shortLink->code) }}"
                    target="_blank">{{ route('url.shortener', $shortLink->code) }}</a></p>
            <p>Original Link: {{ $shortLink->link ?? null }}</p>
            <p>IP: {{ $linkVisit->ip ?? null }}</p>
            <p>City: {{ $linkVisit->city ?? null }}</p>
            <p>Country: {{ $linkVisit->country ?? null }}</p>
            <p>Latitude: {{ $linkVisit->latitude ?? null }}</p>
            <p>Longitude: {{ $linkVisit->longitude ?? null }}</p>
            <p>Timezone: {{ $linkVisit->timezone ?? null }}</p>
            <p>Currency Code: {{ $linkVisit->currency_code ?? null }}</p>
            <p>Currency Symbol: {{ $linkVisit->currency_symbol ?? null }}</p>
        </div>
        <button class="btn btn-success copy-button">

            <a href="{{ route('generate-shortlink') }}" style="color: black; text-decoration: none;">Back</a></button>
        <footer>
            <nav>
                <a href="/">Homepage</a>
                <span> | </span>
                <a href="{{ route('generate-shortlink') }}">Generate Short Link</a>
            </nav>
            <p>
            </p>
            <div>© 2023 - URL Shortener</div>
        </footer>
        <script src="{{ asset('js/script.js') }}"></script>
        <!-- Add your JavaScript or external script links here if needed -->
    </div>
</body>

</html>
