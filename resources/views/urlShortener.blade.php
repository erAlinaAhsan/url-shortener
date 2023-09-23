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
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card {
            border: none;
            border-radius: 10px;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>

    <title>URL Shortener</title>
</head>

<body>
    <div class="container mt-5">
        <div class="card p-4">
            <h2 class="text-center mb-4">URL Shortener</h2>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form method="post" action="{{ route('generate-shortlink') }}">

                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="link" class="form-control" placeholder="Enter URL" required>
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit">Generate Shortened URL</button>
                    </div>
                </div>
                @error('link')
                    <p class="text-danger">{{ $message }}</p>
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
                                <button type="submit" class="btn btn-danger btn-sm"
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
