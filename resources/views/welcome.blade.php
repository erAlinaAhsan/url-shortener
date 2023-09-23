<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Laravel URL Shortener</title>
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            text-align: center;
        }

        h1 {
            color: #333;
            font-size: 36px;
            margin-top: 100px;
        }

        p {
            color: #666;
            font-size: 18px;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
            margin-top: 20px;
        }

        a:hover {
            background-color: #0056b3;
        }

        img {
            max-width: 100%;
            height: auto;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <h1>Welcome To Laravel URL Shortener</h1>
    <p>Shorten your long URLs quickly and easily with our Laravel URL Shortener. Share them more efficiently and track
        their performance.</p>
    <a href="{{ route('generate-shortlink') }}">Make your URL short</a>

    <img src="https://cre8ive.co.nz/wp-content/uploads/2018/04/url-shortener.png" alt="URL Shortener" />
</body>

</html>
