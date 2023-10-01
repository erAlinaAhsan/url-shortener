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


        <p>
            Welcome to Qlipify, our handy URL shortening tool. Whether you're sharing links on social media, in emails,
            or
            anywhere else, we're here to make it easier for you.</p>




        <button class="btn btn-success copy-button"
            style="border: 3px solid rgb(3, 3, 145); box-shadow: 0 0 0 3px yellow inset; position: relative;">

            <a href="{{ route('generate-shortlink') }}">Let's Get Started</a></button>
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
