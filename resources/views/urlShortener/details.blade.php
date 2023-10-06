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
                <button class="btn btn-success"
                    style="width: 50px; height: 50px; background-color: white;border: 2px solid rgb(73, 56, 56);">
                    <img src="https://cdn-icons-png.flaticon.com/512/5604/5604391.png" alt="Scissor"
                        style="width: 35px; height: 35px;">
                </button>
                <span
                    style="font-family: pacifico; color: rgb(225, 45, 0);-webkit-text-stroke: 2px yellow; margin-left: 10px;">
                    Qlip</span>
                <span
                    style="font-family: 'Comic Sans MS', cursive; color: lightblue; -webkit-text-stroke: 2px white;">ify</span>

            </div>
        </header>
        <h2 class="text-center">URL Details</h2>
        <div class="details-container">
            <p>ID: {{ $shortLink->id }}</p>
            <p>Short Link: <a href="{{ route('url.shortener', $shortLink->code) }}"
                    target="_blank">{{ route('url.shortener', $shortLink->code) }}</a></p>
            <p>Original Link: {{ $shortLink->link }}</p>

            <p>IP: {{ $linkVisit->ip }}</p>
            <p>City: {{ $linkVisit->city }}</p>
            <p>Country: {{ $linkVisit->country }}</p>
            <p>Latitude: {{ $linkVisit->latitude }}</p>
            <p>Longitude: {{ $linkVisit->longitude }}</p>
            <p>Timezone: {{ $linkVisit->timezone }}</p>
            <p>Currency Code: {{ $linkVisit->currency_code }}</p>
            <p>Currency Symbol: {{ $linkVisit->currency_symbol }}</p>
        </div>
        <button class="btn btn-success copy-button"
            style="border: 3px solid rgb(3, 3, 145); box-shadow: 0 0 0 3px yellow inset; position: relative;">
            <a href="{{ route('generate-shortlink') }}">Back</a></button>
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
