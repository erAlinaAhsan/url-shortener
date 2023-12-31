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
        <header>
            <div style="display: flex; align-items: center;">
                ✂️
                </button>
                <span style="color: white; margin-left: 10px;">
                    CLIPify</span>

            </div>
        </header>

        <p>
        </p>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form method="post" action="{{ route('generate-shortlink') }}">
            @csrf
            <div class="input-group">
                <input type="text" name="link" class="form-control narrow-input" placeholder="Enter your long URL"
                    required>
                <div class="input-group">
                    <button class="btn btn-success copy-button"
                        style="background-color: rgb(81, 84, 85); color: white; border: 1px solid black;">
                        ✂️
                    </button>




                </div>
            </div>
            @error('link')
                <p class="text-danger mt-2">{{ $message }}</p>
            @enderror
        </form>
        <p></p>
        <table class="table table-bordered mt-4">
            <thead class="thead-dark">

            </thead>
            <tbody>

            </tbody>
        </table>
        <p>
        </p>
        <footer>
            <nav>
                @foreach ($shortLinks as $row)
                    <tr>
                        <td> <a href="{{ route('url.details', $row->id) }}">URL Details</a></td>
                    </tr>
                @endforeach
                <span> | </span>
                <a href="/">Homepage</a>

            </nav>
            <p>
            </p>
            <div>© 2023 - URL Shortener</div>
        </footer>

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
</body>

</html>
