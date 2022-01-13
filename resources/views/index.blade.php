<!DOCTYPE html>
<html>

<head>
    <title>{{ config('title') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

</head>

<body class="dark-mode hold-transition sidebar-mini">
    <div class="container">
        <h1>Create Your Short URL</h1>

        <div class="card">
            <div class="card-header">
                <form method="POST" action="{{ route('shortUrl.post') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="url" id="url" class="form-control @error('url') is-invalid @enderror" placeholder="Enter URL" required>
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">Generate Shorten Link</button>
                        </div>
                        @error('url')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="card-body">
            
            @if(!empty($success))
            <div class="alert alert-success alert-dismissible fade show" role="alert"> 
                {{ $success }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            
            <div class="input-group mb-3">
                <h4>You'r Url: </h4>
                <input type="text" name="link" class="form-control" placeholder="URL" value="{{ $data['url'] ?? '' }}" disabled>
            </div>

            <div class="input-group mb-3">
                <h4>Short Url: </h4>
                <input type="text" name="link" class="form-control" placeholder="Short URL" value="{{ $data['short_url'] ?? '' }}" disabled>
            </div>
        </div>
    </div>

    </div>

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    <script>
        window.setTimeout(function(){
            $(".alert").alert('close')
        }, 3000);
    </script>

</body>

</html>