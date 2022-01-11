<!DOCTYPE html>
<html>

<head>
    <title>{{ config('title') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
</head>

<body>

    <div class="container">
        <h1>Create Your Short URL</h1>

        <div class="card">
            <div class="card-header">
                <form method="POST" action="{{ route('shortUrl.post') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="url" id="url" class="form-control" placeholder="Enter URL" value="{{ old($data['url']) }}">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">Generate Shorten Link</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                {{--
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
            </div>
            @endif
            --}}
            <div class="input-group mb-3">
                <h4>You'r Url: </h4>
                <input type="text" name="link" class="form-control" placeholder="URL" value="{{ $data['url'] }}" disabled>
            </div>

            <div class="input-group mb-3">
                <h4>Short Url: </h4>
                <input type="text" name="link" class="form-control" placeholder="Short URL" value="{{ $data['short_url'] }}" disabled>
            </div>
        </div>
    </div>

    </div>

</body>

</html>