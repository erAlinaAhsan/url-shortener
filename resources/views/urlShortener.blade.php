<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Custom CSS for styling -->
    <style>
        /* Add your custom CSS here */
        body {
            background-color: #f8f9fa;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        .card {
            border: none;
            border-radius: 10px;
            background-color: #f8f9fa;
            padding: 20px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-success {
            background-color: #17a2b8;
            border: none;
            width: 100%;
            font-weight: bold;
        }

        .btn-success:hover {
            background-color: #138496;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
            width: 100%;
            font-weight: bold;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .url-shortener-image {
            width: 30%;
            /* Decreased the width to 30% */
            height: auto;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        h2 {
            color: #343a40;
            font-weight: bold;
            text-shadow: 2px 2px 2px #eee;
            margin-bottom: 20px;
            /* Added margin for spacing */
        }

        .alert {
            margin-top: 10px;
        }

        .form-control {
            border: 2px solid #ced4da;
            border-radius: 5px;
        }

        .input-group-text {
            background-color: #f8f9fa;
        }

        .table {
            background-color: #ffffff;
            border-radius: 10px;
        }

        .thead-dark {
            background-color: #343a40;
            color: #fff;
            font-weight: bold;
            border-radius: 10px;
        }

        /* Added styles for more attractive text */
        .attractive-text {
            font-size: 18px;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>

    <title>URL Shortener</title>
</head>

<body>
    <div class="container">
        <img src="https://www.sms-magic.com/wp-content/uploads/2021/01/Shorten-URL-1536x952.png"
            class="url-shortener-image" alt="URL Shortener Image">
        <div class="card p-4">
            <h2 class="text-center">Welcome to the URL Shortener</h2>
            <p class="attractive-text">Easily shorten your long URLs and manage them with our simple tool.</p>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form method="post" action="{{ route('generate-shortlink') }}">
                @csrf
                <div class="input-group">
                    <input type="text" name="link" class="form-control" placeholder="Enter your long URL"
                        required>
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit">Shorten URL</button>
                    </div>
                </div>
                @error('link')
                    <p class="text-danger mt-2">{{ $message }}</p>
                @enderror
            </form>
        </div>
        <table class="table table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Short Link</th>
                    <th>Original Link</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shortLinks as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td><a href="{{ route('url.shortener', $row->code) }}" target="_blank">
                                {{ route('url.shortener', $row->code) }}</a></td>
                        <td>{{ $row->link }}</td>
                        <td>
                            <form action="{{ route('short-urls.destroy', $row->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this URL?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
