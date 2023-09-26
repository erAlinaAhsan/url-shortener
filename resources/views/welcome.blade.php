<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Welcome to Er Alina Ahsan URL Shortener</title>
</head>

<body>

    <div class="maincontainer">
        <h1>Welcome to Er Alina Ahsan URL Shortener</h1>
        <p>
            Welcome to our handy URL shortening tool. Whether you're sharing links on social media, in emails, or
            anywhere else, we're here to make it easier for you.</p>

        <p> Simply enter your long URL in the box, and we'll swiftly
            generate a short link for you. Save characters, track clicks, and manage your links efficiently with our
            simple and
            effective tool. </p>

        <p> Form present on next page consists of ID, Short Link, Original Link and Action (Delete, Copy). Clicking on
            ID
            will redirect you to the URL Details page which comprises of details like ID, Short Link, Original Link, IP
            address, City, Country, Latitude, Longitude, Timezone, Currency Code and Currency Symbol. Delete and Copy
            button
            present under Action will delete and copy the generated url.</p>
        <button class="btn btn-success copy-button ">
            <a href="{{ route('generate-shortlink') }}">Let's Get Started</a></button>
        <div class="credit">Made with <span style="color:tomato;font-size:20px;">❤ </span>by<a
                href="https://www.learningrobo.com/"> Er Alina Ahsan </a></div>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
    </div>
</body>

</html>
