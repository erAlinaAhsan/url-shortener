<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>URL Shortener</title>
</head>

<body>
    <div class="maincontainer">
        <h2 class="text-center">Welcome to Er Alina Ahsan URL Shortener</h2>
        <p class="attractive-text">Easily shorten your long URLs and manage them with our simple tool.</p>
        <p class="attractive-text">Click on ID to get the URL details.</p>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form method="post" action="{{ route('generate-shortlink') }}">
            @csrf
            <div class="input-group">
                <input type="text" name="link" class="form-control narrow-input" placeholder="Enter your long URL"
                    required>
                <div class="input-group-append">
                    <button class="btn btn-success " type="submit">Shorten URL</button>
                </div>
            </div>
            @error('link')
                <p class="text-danger mt-2">{{ $message }}</p>
            @enderror
        </form>
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
                        <td> <a href="{{ route('url.details', $row->id) }}">{{ $row->id }}</a></td>
                        <td><a href="{{ route('url.shortener', $row->code) }}" target="_blank">
                                {{ route('url.shortener', $row->code) }}</a>
                        </td>
                        <td>{{ $row->link }}</td>
                        <td>
                            <form action="{{ route('short-urls.destroy', $row->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this URL?')">Delete</button>
                            </form>
                        </td>
                        <td>
                            <button class="btn btn-primary btn-sm copy-button"
                                data-url="{{ route('url.shortener', $row->code) }}">
                                Copy
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="credit">Made with <span style="color:tomato;font-size:20px;">❤ </span>by<a
                href="https://www.learningrobo.com/"> Er Alina Ahsan </a></div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
    </div>
    <!-- Add this script for displaying and auto-hiding status messages -->
    <script>
        // Check if a status message is present
        var statusMessage = "{{ session('status') }}";

        if (statusMessage) {
            // Display the message in an alert
            alert(statusMessage);

            // Auto-hide the alert after 3 seconds (3000 milliseconds)
            setTimeout(function() {
                document.querySelector('.alert').style.display = 'none';
            }, 3000);
        }
    </script>
    <script src="{{ asset('js/copy-url.js') }}"></script>
</body>

</html>
