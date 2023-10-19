<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Welcome to Er Alina Ahsan URL Shortener</title>
</head>

<body>

    <div class="maincontainer">
        <header>
            <div style="display: flex; align-items: center;">
                ✂️
                <span style="color: white; margin-left: 10px;">
                    CLIPify</span>


            </div>
        </header>


        <p>
            Welcome to Qlipify, our handy URL shortening tool. Whether you're sharing links on social media, in emails,
            or
            anywhere else, we're here to make it easier for you.</p>




        <button class="btn btn-success copy-button">

            <a href="{{ route('generate-shortlink') }}" style="color: black; text-decoration: none;">Start</a></button>
        </button>

        <p> </p>
        <footer>


            <a href="{{ route('generate-shortlink') }}">Generate Short Link</a>
            <p>
            </p>
            <div>© 2023 - URL Shortener</div>
        </footer>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
    </div>
</body>

</html>
